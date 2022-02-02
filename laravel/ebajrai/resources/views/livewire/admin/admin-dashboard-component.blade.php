<!DOCTYPE html>

<html>
    
    <head>
        
        {{-- <title> Products </title> --}}

        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/astyle.css') }}">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        
        <style>
            
            body{
                margin: 0px;
                padding: 0px;
            }

            .btn {
                background-color: #53B175;
                color: white;
                border: 2px solid #53B175;
                width: 100%;
                height: 50px;
                border-radius: 10px;
            }
            
            button {
                border: none; 
                font-family: Times New Roman; 
                width: 45%
            }
            
            .delete {
                background-color: white;
                border: 2px solid #53B175;
                width: 120px;
            }

            footer{
                position: relative;
            }

            button:hover{
                cursor: pointer;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
                font-size: 17px;
                transition: 0.3s;
            }

            .edit {
                background-color: 53B175;
                width: 120px;
                border: 2px solid #53B175;
                color: white;
            }

            .edit:hover{
                cursor: pointer;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
                font-size: 17px;
                transition: 0.3s;
            }

            .delete:hover{
                cursor: pointer;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
                font-size: 17px;
                transition: 0.3s;
                background-color: #e67575;
                color: white;
            }

            .item:hover{
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
                transition: 0.3s;
            }
            
            .image:hover img{
                transition: 0.3s;
                -webkit-transform: scale(1.0);
                transform: scale(1.1);
            }
            
        </style>
        @livewireStyles

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
        @livewireScripts
    
    </head>
    
    <body>
        
        <div class="top">
            <img src="{{ asset('images/logo.png') }}" width="80pixels" height="80pixels">
            <div style="padding-top: 25px"> E-Bajrai Mini Market </div>
            <div class="menu">
                <div> <a href="{{ route('aboutshop') }}"> About </a> </div>
                <div> <a href="{{ route('home2') }}"> Products </a> </div>
                <div> <a href="{{ route('admin.order') }}"> Orders </a> </div>
                <div> <a href="{{ route('admin.sales') }}"> Analytics </a> </div>
            </div>
            <div class="dropdown">
                <div class="user dropbtn"> <a href="profile.html"><img src="{{ asset('images/user.jpg') }}" width="35pixels" height="35pixels"></a> </div>
                <div class="dropdown-content">
                    <a href="{{ route('aboutshop') }}">Home</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf    
                    </form>
                </div>
            </div>
        </div>
        
        {{$slot}}
    
    </body>
    <footer>
        <p>© Copyright 2021 Bajrai Mini Market, Inc.</p>
    </footer>
</html>
