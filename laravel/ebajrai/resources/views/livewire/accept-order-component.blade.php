<!DOCTYPE html>

<html>
    
    <head>
        
        <title> E-Bajrai Mini Market | Success </title>
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
        <link rel="stylesheet" href="base_style.css">
        
        <style>
            
            .base {
                width: 600px;
                background-color: white;
                padding: 20px 0 20px 0;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em 0.8em 0.8em 0.8em;
                line-height: 2.0;
                text-align: center;
            }
            
            .atas {
                border-bottom: none; 
                border-radius: 0.8em 0.8em 0 0; 
                background-image:url(images/back.jpg);
            }
            
            .bawah {border-radius: 0 0 0.8em 0.8em;}
            
        </style>
    
    </head>
    
    <body>
        <br><br><br><br>
        <div class="base atas"> 
            <img src="images/right.png" width="100pixels"> <br>
            <b> Thank you ! <br> Your order has been received. <br></b>
        </div>
        
        <div class="base bawah">
            Your items has been placed and is on it's way to being processed. <br><br>
            <form action="{{ route('user.orders') }}">
                <button style="background-color: #53B175;">View my order</button>
            </form>
        </div>
    
    </body>

</html>
