 let prix = document.getElementById('prixProd').value;
 paypal.Buttons({
    createOrder: function(data, actions) {

          return actions.order.create({

              purchase_units: [

                {

                  amount:{
                    currency_code: "USD",
                    value: prix,
                  },

                },

              ],

          })

        },
        onApprove: function(data, actions){
            return actions.order.capture().then(function(details){
                alert("Transaction reussi par" + details.payer.name.giver);
            });
        }
 }).render('#paypal-button-container');