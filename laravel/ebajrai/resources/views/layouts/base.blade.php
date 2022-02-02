<!DOCTYPE html>

<html>
    
    <head>
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_style.css') }}">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        @livewireStyles
        
         <script type="text/javascript"> 
            function addedtocart() {
                alert("Item added to cart!");
            }
        </script>

        @livewireScripts
        
        <style>
            body
            {
                padding: 0px;
                margin: 0px;
            }
            footer
            {
                position: absolute;
            }
            button:hover
            {
                cursor: pointer;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
                font-size: 17px;
                transition: 0.3s;
            }
        </style>

    </head>
    
    <body>
        
        <div class="top">
            <img src="{{ asset('images/logo.png') }}" width:"80pixels" height="80pixels">
            <div style="padding-top: 25px"> E-Bajrai Mini Market </div>
            <div class="menu">
                <div> <a href="{{ route('aboutshop') }}"> About </a> </div>
                <div> <a href="{{ route('home1') }}">  Shop  </a> </div>
                <div> <a href="/cart"> Cart </a> </div>
                <div> <a href="{{ route('user.orders') }}"> Order </a> </div>
            </div>
            

            @if(Route::has('login'))
                @auth 
                    @if(Auth::user()->utype === 'ADM')
                    <div class="dropdown">
                        <div class="user dropbtn"> <a href="profile.html"><img src="{{ asset('images/user.jpg') }}" width="35pixels" height="35pixels"></a> </div>
                        <div class="dropdown-content">
                            <a href="{{ route('home2') }}">Home</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf    
                            </form>
                        </div>
                    </div>
                    @else
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
                    @endif
                @else
                <div class="user"> <a href="{{ route('login') }}"><img src="{{ asset('images/userlogin.png') }}" width="50pixels"></a> </div>   
                @endif
            @endif
        </div>
        
        {{$slot}}
        @yield('content')
        
        <footer>
            <p>© Copyright 2021 Bajrai Mini Market, Inc.</p>
        </footer>
    </body>

</html>