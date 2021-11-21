<!DOCTYPE html>

<html>
    
    <head>
        
        <title> Shopping Cart </title>
        
        <link rel="stylesheet" href="base_style.css">
        
        <style>
    
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
            
            .atas {font-weight: bold; font-size: 18px;}
        
        </style>
        
        <script type="text/javascript">
            
            var image = ["Apple.jpg", "Banana.jpg", "Chicken.jpg"];
            var product = ["Red Apple", "Organic Banana", "Whole Fresh Chicken"];
            var unitprice = ["0.90", "5.60", "8.50"];
            var quantity = ["6", "2", "1"];
            var totalprice = new Array(3);
            var totalall=0;
            
            for (i=0; i<3; i++) {
                totalprice[i] = unitprice[i] * quantity[i];
                totalall = totalall + totalprice[i];
            }
            totalall = totalall.toFixed(2);
        
        </script>
    
    </head>
    
    <body>
        
        <div class="title">
            <b> My Shopping Cart </b>
        </div>
        
        <br><br>
        
        <div class="cart atas">
            <div> Product </div>
            <div> Unit Price </div>
            <div> Quantity </div>
            <div> Total Price </div>
        </div> <br>
        
        <div class="cart">
        <script type="text/javascript">
        
            for (i=0; i<3; i++) 
            { 
                totalprice[i] = totalprice[i].toFixed(2);
                
                document.write("<div style='text-align:left;'> <img src=images/" + image[i] +" width='80pixels' height='80pixels' valign='middle'> &emsp;&emsp;&emsp;" + product[i] + "</div>");
                document.write("<div style='padding-top:30px;'> RM " + unitprice[i] + "</div>");
                document.write("<div style='padding-top:30px;'>" + quantity[i] + "</div>");
                document.write("<div style='padding-top:30px;'> RM " + totalprice[i] + "</div>");    
                document.write("<div style='padding-top:30px;'> <a href='' style='background-color: #53B175; padding: 12px 18px 12px 18px'> Delete </a> </div>");
            }
            
        </script>
        </div> <br>
        
        <div class="cart">
            <div></div><div></div>
            <div> <b style="font-size: 18px;">Total : </b>RM
            <script type="text/javascript"> document.write(totalall); </script> </div>
            <div style="grid-column: 4/6"> <a href="checkout.html" style="background-color: #53B175; padding: 12px 90px 12px 90px"> Check out </a> </div>
        </div>
    
    </body>

</html>