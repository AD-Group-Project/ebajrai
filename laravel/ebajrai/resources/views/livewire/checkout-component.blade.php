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
                display: grid;
                width: 460px;
                grid-template-columns: 230px 230px;
                grid-template-rows: 1fr;
                background-color: white;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0 0 0.8em 0.8em;
                padding: 20px 20px 20px 20px;
                line-height: 2.0;
                grid-row-gap: 20px;
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
                width: 16%;
                height: 30px;
                border-radius: 50%;
            }

            .btn{
                background-color: #53B175; 
                padding: 12px 120px 12px 120px; 
                border: none; 
                color: white;
                font-family: serif;
                font-size: 16px;
            }

            .btn:hover {text-decoration: underline;}
            .bawah {border-radius: 0 0 0.8em 0.8em}
            .satu { grid-area: 1/1/2/3; padding: 0 0 0 20px;}
            .option { width: 460px; }
        
        </style>
    
    </head>
    
    <body>
        
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
            <div class="base atas option"> Payment Method </div>
            
            <div class="paymenthod">
                <div class="satu"> Please choose your payment method : <br></div> 
                <div>  
                    <input type="radio" name="pay" value="cash">  
                    <img src="images/cash.jpg" width="170pixels"> 
                </div>  
                <div> 
                <img src="images/o9.jpg" width="170pixels"> <br>
                    
                <input type="radio" name="pay" value="maybank"> Maybank2u <br>
                <input type="radio" name="pay" value="cimb"> CIMB Clicks <br>
                <input type="radio" name="pay" value="rhb"> RHB Now <br>
                <br>
                </div>
            </div> 
                
        </div>
               
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
                <div style="padding: 33px 0px 0px 62px"> <input type="button" onClick="isEmpty()" value="Confirm" class="btn"> </div>
            </div> 
            
        </div>
        </div></form>
    </body>

</html>
