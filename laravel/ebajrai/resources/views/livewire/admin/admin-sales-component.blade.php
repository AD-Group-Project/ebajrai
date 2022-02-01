<!DOCTYPE html>

<html>

  <head>  
    <title> Sales Analytics </title> 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base_style.css') }}">
    <style>

        .icon-stat1 {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            width: 200px;
            margin-bottom: 1em;
            margin-left: 2px;
            margin-right: 2px;
            background-color: #fff;
            border-radius: 0.8em;
            border: 1px solid #ddd;
        }
        .icon-stat-label1 {
            display: block;
            color: #999;
            font-size: 13px;
        }
        .icon-stat-value1 {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }
        .icon-stat-visual1 {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }
        .bg-primary1 {
            color: #fff;
            background: #d74b4b;
        }
        .bg-secondary1 {
            color: #fff;
            background: #53B175;
        }
        
        .icon-stat-footer1 {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
        .panel-heading{
          text-align: center;
          font-size: 20px;
          width: 1300px;
          background-color: #53B175;
          color: white;
          padding: 10px;
          margin: auto;
          border: 1px solid #E5E4E2;
          border-radius: 0.8em 0.8em 0em 0em;
          font-family: serif;
        }
        .table1 {
            display: grid;
            grid-template-columns: 150px 150px 150px 250px 150px 150px 250px;
            grid-template-rows: 1fr;
            width: 1300px;
            background-color: white;
            padding: 30px 30px 30px 30px;
            margin: auto;
            border: 1px solid #E5E4E2;
            border-radius: 0em 0em 0.8em 0.8em;
            grid-row-gap: 40px;
        }
        .tableheader1 {font-weight: bold; font-size: 18px;}  
        footer{
          position: relative;
        }

    </style>
  </head>
  
  <body>
    <div class="title">
      <b> Sales Analytics </b>
    </div> <br> 

    <div class="container">
        <div class="row">  
            <div class="col icon-stat1"> 
              <div class="row">   
                <div class="col text-left">
                  <span class="icon-stat-label1">Total Revenue</span>
                  <span class="icon-stat-value1">RM <?php echo number_format($totalRevenue , 2, '.', '') ?></span>
                </div>   
                <div class="col text-center">
                  <i class="fa fa-dollar icon-stat-visual1 bg-primary1"></i>
                </div>  
              </div>  
              <div class="icon-stat-footer1">
                <i class="fa fa-clock-o"></i> Updated Now
              </div>    
            </div>          
            <div class="col icon-stat1"> 
              <div class="row">    
                <div class="col text-left">
                  <span class="icon-stat-label1">Total Sales</span>
                  <span class="icon-stat-value1">{{$totalSales}}</span>
                </div>    
                <div class="col text-center">
                  <i class="fa fa-gift icon-stat-visual1 bg-secondary1"></i>
                </div>   
              </div>
                <div class="icon-stat-footer1">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>
            </div>       
            <div class="col icon-stat1"> 
              <div class="row">    
                <div class="col text-left">
                  <span class="icon-stat-label1">Today Revenue</span>
                  <span class="icon-stat-value1">RM <?php echo number_format($todayRevenue , 2, '.', '') ?></span>
                </div>    
                <div class="col text-center">
                  <i class="fa fa-dollar icon-stat-visual1 bg-primary1"></i>
                </div> 
              </div>   
                <div class="icon-stat-footer1">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>
            </div>       
            <div class="col icon-stat1">  
              <div class="row">  
                <div class="col text-left">
                  <span class="icon-stat-label1">Today Sales</span>
                  <span class="icon-stat-value1">{{$todaySales}}</span>
                </div>    
                <div class="col text-center">
                  <i class="fa fa-gift icon-stat-visual1 bg-secondary1"></i>
                </div>  
              </div>  
                <div class="icon-stat-footer1">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div> 
            </div>      
        </div>  
        <br><br><br>
        <div class="row">
          <div class="col-md-12">
            <div class="panel-heading">
                Latest Order
            </div>     
            
            <div class="table1 tableheader1">
                <div> Order ID </div>
                <div> SubTotal </div>
                <div> Order Total </div>
                <div> Name </div>
                <div> Mobile </div>
                <div> Status </div>
                <div> Order Date </div>
            </div> <br>
                      
            <div class="table1" style="border-radius: 0.8em;">
            @foreach ($orders as $order)
                <div> {{$order->id}} </div>
                <div> RM {{$order->subtotal}} </div>
                <div> RM {{$order->total}} </div>
                <div> {{$order->name}} </div>  
                <div> {{$order->mobile}} </div> 
                <div> {{$order->status}} </div>
                <div> {{$order->created_at}} </div>  
            @endforeach
            </div> 
          </div>
        </div>
    </div>  
    <br><br>    
  </body>
</html>

         
