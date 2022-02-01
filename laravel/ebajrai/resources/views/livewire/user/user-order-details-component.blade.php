<!DOCTYPE html>

<html> 
    <head>        
        <title> Order Details </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">        
        <style>
            body {
                background-color: #F5F8F2;
                color: darkslategray;
                font-family: Times New Roman;
            }
            .cart {
                display: grid;
                grid-template-columns: 1fr 150px 150px 150px;
                grid-template-rows: 1fr;
                grid-row-gap: 15px;
                width: 850px;
                padding-top:30px;
            }
            
            .base {
                background-color: white;
                padding: 20px 0px 20px 50px;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em 0.8em 0.8em 0.8em;
                line-height: 2.0;
            }
            
            .atas {border-bottom: none; border-radius: 0.8em 0.8em 0 0; font-weight: bold; font-size: 18px;}
            .tengah{border-bottom: none; border-radius: 0 0 0 0;}
            .bawah {border-radius: 0 0 0.8em 0.8em}
            .jarak {padding-bottom: 10px;} 
            a:hover {color:white;}

            footer{
                position: relative !important;
            }
        </style> 
    </head>
    
    <body>
        
        <div class="title">
            <b> Order Details </b>
        </div> <br><br>

        <div class="base cart atas">
            <div> Product Ordered </div>
            <div> Unit Price </div>
            <div> Quantity </div>
            <div> Item subtotal </div>
        </div>
        
        <div class="base cart tengah">
        @foreach ($order->orderItems as $item)
            <div> <img src="{{ asset('images') }}/{{ $item->product->image }}" width='30%' valign='middle'> &emsp;&emsp;{{ $item->product->name }} </div>
            <div style='padding-top:30px;'> RM {{ $item->price }} </div>
            <div style='padding-top:30px;'> {{ $item->quantity }} </div>
            <div style='padding-top:30px;'> RM <?php echo number_format($item->price * $item->quantity, 2, '.', '') ?></div>
        @endforeach
        </div> 
        <div class="base cart bawah">
            <div> <b>Subtotal</b> </div>
            <div></div>
            <div></div>
            <div> <b> RM {{ $order->subtotal }} </b> </div>
            <div> <b>Shipping</b> </div>
            <div></div>
            <div></div>
            <div> <b> RM <?php echo number_format($order->total - $order->subtotal, 2, '.', '') ?> </b> </div>
            <div> <b>Total Order</b> </div>
            <div></div>
            <div></div>
            <div> <b> RM {{ $order->total }} </b> </div>
        </div> <br>

        <div class="base cart atas">
            Order Details
        </div>
        <div class="base bawah" style="width: 850px">
                <div class="row">
                    <div class="col-md-3 jarak"> <b>Order ID</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->id }} </div> 
                    <div class="col-md-3 jarak"> <b>Order Total</b> </div>
                    <div class="col-md-9 jarak"> RM {{ $order->total }} </div>
                    <div class="col-md-3 jarak"> <b>Order Date</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->created_at }}  </div>
                    <div class="col-md-3 jarak"> <b>Delivery Method</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->delivery->deliveryType }} </div>
                    <div class="col-md-3 jarak"> <b>Order Status</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->status }} </div>
                    <div class="col-md-3 jarak"> <b>Name</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->name }} </div>
                    <div class="col-md-3 jarak"> <b>Phone Number</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->mobile }} </div>
                    <div class="col-md-3 jarak"> <b>Email</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->email }} </div>
                    <div class="col-md-3 jarak"> <b>Address</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->address }} </div>
                </div><br>
                @if($order->status == "pending")
                    <button style="width:200px"> <a href="/payment/{{ $order->id }}">Proceed to payment</a> </button>
                @endif
        </div><br>

        @if($order->status == "delivered")
        <div class="base cart atas">
            Delivery Details
        </div>
        <div class="base bawah" style="width: 850px">
                <div class="row">
                    <div class="col-md-3 jarak"> <b>Order Status</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->status }} </div> 
                    <div class="col-md-3 jarak"> <b>Delivery Date</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->delivered_date }} </div>
                    <div class="col-md-3 jarak"> <b>Delivery Courier</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->courier }} </div>
                    <div class="col-md-3 jarak"> <b>Tracking Number</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->trackingno }}  </div>
                </div>
        </div>
        @elseif($order->status == "canceled")
        <div class="base cart atas">
            Delivery Details
        </div>
        <div class="base bawah" style="width: 850px">
                <div class="row">
                    <div class="col-md-3 jarak"> <b>Order Status</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->status }} </div> 
                    <div class="col-md-3 jarak"> <b>Canceled Date</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->canceled_date }} </div>
                </div>
        </div>
        @elseif($order->status == "completed")
        <div class="base cart atas">
            Delivery Details
        </div>
        <div class="base bawah" style="width: 850px">
                <div class="row">
                    <div class="col-md-3 jarak"> <b>Order Status</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->status }} </div> 
                    <div class="col-md-3 jarak"> <b>Pickup Date</b> </div>
                    <div class="col-md-9 jarak"> {{ $order->pickup_date }} </div>
                </div>
        </div>
        @endif
        <br><br><br>
    </body>

</html>
