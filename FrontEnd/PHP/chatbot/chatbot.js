document.addEventListener('DOMContentLoaded', function () {
    const chatButton = document.getElementById("chatbot-toggle");
    const chatWindow = document.getElementById("chatbot-window");

    chatButton.addEventListener('click', function () {
        chatWindow.style.display = 'block';
    });
});


const API_TOKEN = "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"; 

async function sendMessage() {
  const text = input.value.trim();
  if (!text) return;
  appendMessage("Vous", text);
  input.value = "";

  const res = await fetch("chatbot-api.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Authorization": "Bearer " + API_TOKEN
    },
    body: JSON.stringify({ message: text })
  });

  const data = await res.json();
  appendMessage("Bot", data.reply);
}

