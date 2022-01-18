<!DOCTYPE html>

<html>

    <head>

        <title> E-Bajrai | Checkout </title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_style.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

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

            .kotak1 {
                background-color: #f5f4f2;
                width: 85%;
                padding: 8px 10px 10px 10px;
                border: 1px solid gainsboro;
                border-radius: 0.5em;
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
                width: 320px;
                height: 50px;
                font-size: 15px;
                border-radius: 5px;
            }

            a:hover{
                text-decoration: none;
                color: white;
            }

            .container {
                display: flex;
                justify-content: center;
            }

            .user_card{
                /* height: 800px; */
                width: 1100px;
                padding: 20px 80px 20px 80px;
                background-color: white;
                border-radius: 5px;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em;
            }

            .bahagi {
                /* border: 3px solid #fff; */
                /* border: 1px solid #E5E4E2; */
            }

            .besar{
                height: 60px;
                overflow: auto;
            }

            .bahagi1{
                width: 50%;
                float: left;
                padding: 20px;
            }

            .detail{
                padding-top: 15px;
            }
            
            .txtarea{
                border: 1px solid silver;
            }

            .defaultAdd{
                padding-top: 20px;
                padding-left: 50px;
            }

            .btn:hover {text-decoration: underline;}
            .bawah {border-radius: 0 0 0.8em 0.8em}
            .option { width: 460px; }
            .kotakinput{ border: 1px solid #e5e4e2;}

            textarea{
                margin-right: 10px;
            }
        </style>
    </head>

    <body>

        <script src="https://www.paypal.com/sdk/js?client-id=Adi4zh4W6NoQb5-3IZJIouPvE96lHshtseUhmUxKH5QvrpaRJM6H0lzzHTZsiB4KqmLsjSnzb5ysKS37&currency=USD"></script>
        <script>
            function checkAddress()
            {
                if(document.getElementById("radioAdd2").checked == true)
                {
                    if(document.orderForm.name.value == "")
                    {
                        alert( "Please insert name!" );
                        document.orderForm.name.focus() ;
                        return false;
                    }
                    if(document.orderForm.email.value == "")
                    {
                        alert( "Please insert email!" );
                        document.orderForm.email.focus() ;
                        return false;
                    }
                    if(document.orderForm.mobile.value == "")
                    {
                        alert( "Please insert mobile number!" );
                        document.orderForm.mobile.focus() ;
                        return false;
                    }
                    if(document.orderForm.addressnew.value == "")
                    {
                        alert( "Please insert address!" );
                        document.orderForm.addressnew.focus() ;
                        return false;
                    }
                }
            }
        </script>

        <div class="top">
            <img src="{{ asset('images/logo.png') }}" width="80pixels" height="80pixels">
            <div style="padding-top: 25px"> E-Bajrai Mini Market </div>
            <div class="menu">
                <div> <a href="{{ route('aboutshop') }}"> About </a> </div>
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

        <form action="/submitOrder" name="orderForm" method="post" onsubmit="return (checkAddress());">
        {{ csrf_field() }}
        <div class="container">
            <div class="user_card">
                <h2 style="text-align: center"> Shipping Details </h2>
                <hr class="mb-3">

                <input type="radio" name="address" id="radioAdd" value="defaultAddress" checked>
                <label for="radioAdd">Default address:</label>
                <div class="defaultAdd">
                    <p>Name: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Phone Number: {{ $user->profile->phone }}</p>
                    <p>Address: {{ $user->profile->address }}</p>
                </div>

                <br>

                <input type="radio" name="address" id="radioAdd2" value="newAddress">
                <label for="radioAdd">Add new address:</label>
                
                
                <div class="bahagi">
                    <div class="bahagi1">
                        <div class="detail"> Name </div>
                        <input type="text" class="form-control" name="name" placeholder="Your name"/>

                        <div class="detail"> Mobile </div>
                        <input type="text" class="form-control" name="mobile" placeholder="Your phone number"/>                      
                    </div>
                    <div class="bahagi1">
                        <div class="detail"> Email </div>
                        <input type="text" class="form-control" name="email" placeholder="Your email address"/>
                        
                        <div class="detail"> Address </div>
                        <textarea name="addressnew" id="addressnew" class="form-control" rows="5" placeholder="Full Address"></textarea> 
                    </div>
                    <br><br><br>
                </div>
            </div>
        </div>
        <br><br>

        <div class="container">
            {{-- <div class="base atas option"> Delivery Method </div> --}}

            <div class="user_card center">
                <h3 style="text-align: center"> Delivery Method </h3>
                <hr class="mb-3">
                <div class="satu"> Please choose your delivery method : </div><br>
                <div class="row justify-content-center">
                    <div class="col-4">
                    <input type="radio" name="del" value="pickup" checked required>
                    <img src="images/pickup.jpg" width="170pixels">
                    </div>
                    
                    <div class="col-4">
                    <input type="radio" name="del" value="delivery">
                    <img src="images/delivery.jpg" width="170pixels">
                    </div>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col align-self-center">
                            <button type="submit">Proceed</button>
                        </div> 
                    </div>
                </div>
                
            </div>
        </div>
        </form>
    </body>

</html>
