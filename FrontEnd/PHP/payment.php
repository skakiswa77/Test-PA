<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
  <h1>MERCI DE BIEN VOULOIR FINALISER VOTRE ABONNEMENT DANS BUSINESS CARE</h1>
  <p> Puis que vous avez choisir de suivre une formation</p>
  
    <div id="paypal-button-container"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=Aew7SKsxkDyhGNdyWGhJSizFsfqPYVmqHX2feSx-nIMah3CwX60uzYQ3uJF4P9O7uMp_IjbILnISPSiS&currency=EUR"></script>

    <script>
      
      paypal.Buttons({ 
    createOrder: function(data, actions){  
        return actions.order.create({
            purchase_units: [{
                amount:{
                    value: '0.10'
                }
            }]
        });
    },
    onApprove: function(data, actions){
        return actions.order.capture().then(function(details){
            alert("Transaction OK :"+details.payer.name.given_name);
        })
},
    onError: function (err){
        console.error('Payment Error:', err);
        alert("Paiement échoué !"+err.message);
    } 
}).render('#paypal-button-container');
  </script>
</body>
</html>