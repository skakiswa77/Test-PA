<?php
header('Content-Type: application/json');

require 'db.php';

$input = json_decode(file_get_contents("php://input"), true);
$userMessage = trim($input['message'] ?? '');
$token = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

$validToken = "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"; 

if ($token !== "Bearer $validToken") {
    http_response_code(403);
    echo json_encode(['reply' => 'Accès non autorisé.']);
    exit;
}

if (empty($userMessage)) {
    echo json_encode(['reply' => 'Message vide.']);
    exit;
}

$apiKey = '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';

$data = [
    "model" => "gpt-3.5-turbo",
    "messages" => [
        ["role" => "system", "content" => "Tu es un assistant pour Business Care."],
        ["role" => "user", "content" => $userMessage]
    ],
    "temperature" => 0.7
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);

$response = curl_exec($ch);
curl_close($ch);

$responseData = json_decode($response, true);
$botReply = $responseData['choices'][0]['message']['content'] ?? 'Erreur.';

$stmt = $pdo->prepare("INSERT INTO messages (role, message) VALUES (:role, :message)");
$stmt->execute(['role' => 'user', 'message' => $userMessage]);
$stmt->execute(['role' => 'bot', 'message' => $botReply]);

echo json_encode(['reply' => $botReply]);


