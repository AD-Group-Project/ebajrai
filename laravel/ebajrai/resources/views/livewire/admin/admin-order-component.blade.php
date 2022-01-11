<!DOCTYPE html>

<html> 
    <head>        
        <title> Orders </title>        
        <style>
    
            .table {
                display: grid;
                grid-template-columns: 150px 150px 250px 150px 150px 150px 250px 150px;
                grid-template-rows: 1fr;
                width: 1400px;
                background-color: white;
                padding: 30px 30px 30px 30px;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em 0.8em 0.8em 0.8em;
                grid-row-gap: 40px;
            }
            
            .tableheader {font-weight: bold; font-size: 18px;}       
        </style> 
    </head>
    
    <body>
        
        <div class="title">
            <b> Orders </b>
        </div> <br>      
        
        <div class="table tableheader">
            <div> Order ID </div>
            <div> Order Total </div>
            <div> Name </div>
            <div> Mobile </div>
            <div> Zipcode </div>
            <div> Status </div>
            <div> Order Date </div>
            <div> Order </div>
        </div> <br>
        
        
        <div class="table">
        @foreach ($orders as $order)
            <div> {{$order->id}} </div>
            <div> RM {{$order->total}} </div>
            <div> {{$order->name}} </div>  
            <div> {{$order->mobile}} </div> 
            <div> {{$order->zipcode}} </div>
            <div> {{$order->status}} </div>
            <div> {{$order->created_at}} </div>  
            <div> <a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" style='background-color: #53B175; padding: 12px 30px 12px 30px'> View </a> </div>
        @endforeach
        </div>
    
    </body>

</html>