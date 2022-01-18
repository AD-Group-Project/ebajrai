<!DOCTYPE html>

<html>
    
    <head>
        
        <title> Update Order </title>

        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/astyle.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        
        <style>
            body {
                background-color: #F5F8F2;
                height: 100%;
                font-family: 'Times New Roman';
            }
            
            .container {
                display: flex;
                justify-content: center;
            }
            
            .user_card {
                height: 500px;
                width: 700px;
                padding: 0 80px 0 80px;
            }
            
            .bahagi {
                display: grid;
                grid-template-columns: 150px 350px;
                grid-row-gap: 15px;
            }
            
            input, select {
                border: 1px solid darkgray;
                border-radius: 3px;
                height: 30px;
                width: 350px;
            }
            
            button {
                background-color: #53B175;
                color: white;
                border: 2px solid #53B175;
                width: 40%;
                height: 35px;
                border-radius: 10px;
                font-size: 15px;
            }

            a:hover {color: white;}         
        </style>
        @livewireStyles
    </head>
    
    <body>

        <div class="top">
            <img src="{{ asset('images/logo.png') }}" width="80pixels" height="80pixels">
            <div style="padding-top: 25px"> E-Bajrai Mini Market </div>
            <div class="menu">
                <div> <a href="{{ route('admin.about') }}"> About </a> </div>
                <div> <a href="{{ route('home2') }}"> Products </a> </div>
                <div> <a href="{{ route('admin.order') }}"> Orders </a> </div>
                <div> <a href="{{ route('admin.sales') }}"> Analytics </a> </div>
            </div>
            <div class="dropdown">
                <div class="user dropbtn"> <a href="profile.html"><img src="{{ asset('images/user.jpg') }}" width="35pixels" height="35pixels"></a> </div>
                <div class="dropdown-content">
                    <a href="{{ route('home1') }}">Home</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf    
                    </form>
                </div>
            </div>
        </div>
          
        <div class="title">
            <b> Update Order </b>
        </div><br><br>
        
        <div class="container">
            <div class="user_card">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div><form method="post" action="/updateorder/{{ $order[0]->id }}">
                    @csrf
                <h3 style="text-align: center"> Update Order Status </h3><hr> <br>
                    <div class="bahagi">

                        <div> <label>Order ID</label> </div>
                        <div> <label>{{ $order[0]->id }}</label> </div>

                        <div> <label>Order Status</label> </div> 
                        <div> <select name="status" id="status1" onchange="showHide(this.value)"> 
                                <option value="ordered" @if ($order[0]->status == "ordered") selected @endif> Ordered </option>
                                <option value="delivered" @if ($order[0]->status == "delivered") selected @endif> Delivered </option>
                                <option value="completed" @if ($order[0]->status == "completed") selected @endif> Completed </option>
                                <option value="canceled" @if ($order[0]->status == "canceled") selected @endif> Canceled </option>
                        </select> </div>
                    </div><br>
                    <div class="bahagi" id="hiddenField" style="display: none">
                        <div> <label>Delivery Courier</label> </div>
                        <div> <select name="courier"> 
                            <option value="Pos Laju" @if ($order[0]->courier == "Pos Laju") selected @endif> Pos Laju </option>
                            <option value="J&T Express" @if ($order[0]->courier == "J&T Express") selected @endif> J&T Express </option>
                            <option value="Ninja Van" @if ($order[0]->courier == "Ninja Van") selected @endif> Ninja Van </option>
                        </select> </div>

                        <div> <label>Tracking Number</label> </div>
                        <div> <input type="text" name="trackingno" value="{{ $order[0]->trackingno }}"> </div>
                    </div>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script>
                        function showHide(status1) {
                            if(status1 == 'delivered')
                                $("#hiddenField").fadeIn();
                            else 
                                $("#hiddenField").fadeOut();
                        }
                    </script>
                <br><br>
                <div style="display: flex; justify-content: flex-end"><button type="submit"> Update Order </button></div>
                </form></div>
            </div>
        </div>
        <br>
    </body>

</html>