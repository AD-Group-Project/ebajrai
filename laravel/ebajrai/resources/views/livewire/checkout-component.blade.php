<!DOCTYPE html>

<html>
    
    <head>
        
        <title> Shopping Cart </title>
        
        <link rel="stylesheet" href="base_style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" > 
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

        <style>
            
            body {
                background-color: #F5F8F2;
                color: darkslategray;
            }

            .cart {
                display: grid;
                grid-template-columns: 1fr 180px 180px 180px 140px;
                grid-template-rows: 1fr;
                width: 1100px;
                background-color: white;
                padding: 30px 30px 30px 50px;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em 0.8em 0.8em 0.8em;
                grid-row-gap: 15px;
                text-align:center;
            }

            .base {
                background-color: white;
                padding: 20px 0px 20px 50px;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em 0.8em 0.8em 0.8em;
                line-height: 2.0;
            }

            .kotak {
                display: grid;
                width: 1100px;
                grid-template-columns: 550px 550px;
                grid-template-rows: 1fr 1fr;
                margin: auto;
            }

            .paymenthod {
                width: 460px;
                background-color: white;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0 0 0.8em 0.8em;
                padding: 20px 20px 20px 20px;
                line-height: 2.0;
            }
            
            .atas {
                border-bottom: none; 
                border-radius: 0.8em 0.8em 0 0; 
                font-size: 18px; 
                font-weight: bold;
            }

            button {
                background-color: #53B175;
                color: white;
                border: 2px solid white;
                width: 420px;
                height: 50px;
                font-size: 15px;
                border-radius: 5px;
            }

            a:hover{
                text-decoration: none;
                color: white;
            }

            .bawah {border-radius: 0 0 0.8em 0.8em}
            .option { width: 460px; }
            .kotakinput{ border: 1px solid #e5e4e2;}
        
        </style>
    </head>
    
    <body>

        <script src="https://www.paypal.com/sdk/js?client-id=Adi4zh4W6NoQb5-3IZJIouPvE96lHshtseUhmUxKH5QvrpaRJM6H0lzzHTZsiB4KqmLsjSnzb5ysKS37&currency=USD"></script>
        
        <div class="title">
            <b> Checkout </b>
        </div>
        
        <br><br>

        @if(Session::has('success_message'))
            <div class="alert alert-success d-flex justify-content-center">
                {{Session::get('success_message')}}
            </div>
        @endif

        <div class="cart atas">
            <div> Product </div>
            <div> Unit Price </div>
            <div> Quantity </div>
            <div> Total Price </div>
        </div> <br>

        <div class="cart">

            @foreach (Cart::content() as $item)   
                <div style='text-align:left;'> <img src="{{ asset('images') }}/{{ $item->model->image }}" width='80pixels' height='80pixels' valign='middle' alt="{{ $item->model->name }}"> &emsp;&emsp;&emsp; {{ $item->model->name }} </div>
                <div style='padding-top:30px;'> RM {{ $item->model->price }} </div>
                <div style='padding-top:30px;'>
                    {{$item->qty}}									
                </div>
                <div style='padding-top:30px;'> RM {{ $item->subtotal }} </div> 
                <br>
            @endforeach

        </div> <br>     

        <div class="cart">
            <div></div><div></div>
            <div style="grid-column: 4/5"> <b style="font-size: 18px;">Total : </b>RM {{Cart::subtotal()}} </div>
        </div><br>
        
        <form name="form">
        <div class="kotak">
        <div>
            <div class="base atas option"> Delivery Method </div>
            
            <div class="paymenthod">
                <div class="satu"> Please choose your delivery method : </div> 
                <div>  
                    <input type="radio" name="del" value="pickup">  
                    <img src="images/pickup.jpg" width="170pixels"> 
                </div>  
                <div> 
                    <input type="radio" name="del" value="delivery"> 
                    <img src="images/delivery.jpg" width="170pixels">
                </div>
            </div> 
            
        </div>
        <div>
            <div class="base atas option"> Payment Method </div>
            
            <div class="paymenthod">
                <div class="satu"> Please choose your payment method : <br><br></div> 
                <div style="margin-bottom: 11px"><button> <a href="{{ route('acceptOrder') }}">Place Order | COD</a> </button> </div>
                <div id="paypal-button-container"></div>
            </div> 
                
        </div>
        </div></form>

        <script>
            paypal.Buttons({
      
              // Sets up the transaction when a payment button is clicked
              createOrder: function(data, actions) {
                return actions.order.create({
                  purchase_units: [{
                    amount: {
                      value: '{{Cart::subtotal()}}' 
                    }
                  }]
                });
              },
      
              // Finalize the transaction after payer approval
              onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                  // Successful capture! For dev/demo purposes:
                      console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                      var transaction = orderData.purchase_units[0].payments.captures[0];
                      alert('Thank you for your payment!');
                      actions.redirect("{{ route('acceptOrder') }}");
      
                  // When ready to go live, remove the alert and show a success message within this page. For example:
                  // var element = document.getElementById('paypal-button-container');
                  // element.innerHTML = '';
                  // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                  // Or go to another URL:  actions.redirect('thank_you.html');
                });
              }
            }).render('#paypal-button-container');
      
          </script>
    </body>

</html>

