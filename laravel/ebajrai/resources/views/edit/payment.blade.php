<!DOCTYPE html>

<html>

    <head>

        <title> E-Bajrai | Payment </title>
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_style.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

        <style>

            body {
                background-color: #F5F8F2;
                color: darkslategray;
            }

            .totalPayment{
                width: 460px;
                background-color: white;
                margin: auto;
                padding: 20px;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em;
            }

            .paymenthod {
                width: 460px;
                background-color: white;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em;
                padding: 20px 20px 20px 20px;
                line-height: 2.0;
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

            .btn:hover {text-decoration: underline;}

            footer{
                position: absolute;
            }

        </style>
    </head>

    <body>
        <script src="https://www.paypal.com/sdk/js?client-id=Adi4zh4W6NoQb5-3IZJIouPvE96lHshtseUhmUxKH5QvrpaRJM6H0lzzHTZsiB4KqmLsjSnzb5ysKS37&currency=USD"></script>
        <div class="top">
            <img src="{{ asset('images/logo.png') }}" width="80pixels" height="80pixels">
            <div style="padding-top: 25px"> E-Bajrai Mini Market </div>
            <div class="menu">
                <div> <a href="shop_details.html"> About </a> </div>
                <div> <a href="{{ route('home1') }}">  Shop  </a> </div>
                <div> <a href="/cart"> Cart </a> </div>
                <div> <a href="{{ route('user.orders') }}"> Order </a> </div>
        </div>
        <div class="dropdown">
            <div class="user dropbtn"> <a href="{{ route('user.profile') }}"><img src="{{ asset('images/user.jpg') }}" width="35pixels" height="35pixels"></a> </div>
            <div class="dropdown-content">
                <a href="{{ route('user.profile') }}">My Account</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf    
                </form>
            </div>
        </div>
        </div>

        <div class="title">
            <b> Payment </b>
        </div>
        <br>
        <div class="totalPayment"> 
            <b style="font-size: 18px;">Item Price: </b>RM {{ Cart::subtotal() }} <br>
            <b style="font-size: 18px;">Delivery Charges: </b>RM {{ $delivery->totalWithPostage-Cart::subtotal() }} <br>
            <b style="font-size: 18px;">Total Price: </b>RM {{ $delivery->totalWithPostage }}
        </div>
        
        <br>
        <div class="paymenthod">
            <div class="satu"> Please choose your payment method : <br><br></div>
            <div style="margin-bottom: 11px"><button> <a href="{{ route('paymentConfirmation',[$delivery->order_id]) }}">Place Order | COD</a> </button> </div>
            <div id="paypal-button-container"></div>
        </div>

        <script>
            paypal.Buttons({

              // Sets up the transaction when a payment button is clicked
              createOrder: function(data, actions) {
                return actions.order.create({
                  purchase_units: [{
                    amount: {
                      value: '{{ $delivery->totalWithPostage }}'
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
                      actions.redirect("{{ route('paymentConfirmation',[$delivery->order_id]) }}");

                  // When ready to go live, remove the alert and show a success message within this page. For example:
                  // var element = document.getElementById('paypal-button-container');
                  // element.innerHTML = '';
                  // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                  // Or go to another URL:  actions.redirect('thank_you.html');
                });
              }
            }).render('#paypal-button-container');

          </script>
          <footer>
            <p>© Copyright 2021 Bajrai Mini Market, Inc.</p>
        </footer>
    </body>

</html>
