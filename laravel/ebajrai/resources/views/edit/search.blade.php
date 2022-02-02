<!DOCTYPE html>

<html>
    
    <head>

        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

        <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shop_style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/astyle.css') }}">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        @auth
        @if(Auth::user()->utype === 'ADM')
          <title> All Items </title>
        @elseif(Auth::user()->utype === 'USR')
          <title> E-Bajrai Mini Market | All Items </title>
        @endauth
        @else
            <title> E-Bajrai Mini Market | All Items </title>
        @endif
        <style>
            body{
                margin: 0;
                padding: 0;
            }

            footer {
                position: absolute;
            }
            
            .item_input button{
                width: 250px;
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
     
        <div class="title">
            <b> All Item</b>
        </div>

        <div class="content">
            
            <div class="left_content"> 

                <b> Search </b> <br>
                <form action=" {{ url('/search2') }} " method="get">
                    <input style="background-color: #e1f7e3; border-radius: 6px; border: 2px solid gainsboro; width:160px; height:30px;" type="text" name="nameSearch" size="10" placeholder="Search here..">
                    <button name="search" type="submit" style="width: 35px; height: 35px;"><i class="fal fa-search"></i></button>
                </form>
                <br> 
                
                <b> Category </b> <br>
                <ul>
                @foreach ($categories as $category) 
                    <li> <a href="{{ route('product.category',['category_slug'=>$category->slug]) }}" style="color: #268147"> {{ $category->name }} </a> </li>
                @endforeach
                <br>

                </ul>
                
                @auth
                    @if(Auth::user()->utype === 'ADM')
                        <br><div style="display: flex"><button class="btn" style="font-size: 15px"> <a href="{{ route('admin.add') }}">Add New Product</a> </button></div>
                    @endif    
                @endauth

            </div>
            
            <div class="right_content">
                @if(session()->has('message'))
                    <div class="mesej">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @foreach ($products as $product) 
                
                <div class="item">
                    <div class="image"><img src="{{ asset('images') }}/{{ $product->image }}" style="width: 170px; height: 170px" class="center"></div>
                    <b> {{ $product->name }} </b> <br>
                    <a href="{{route('product.details',['slug'=>$product->slug])}}" style="font-size: 12px; color: #268147"> Description </a> <br>
                    <div style="color: #268147; text-align: center"> RM {{ $product->price }} </div>
                    @auth
                    @if (Auth::user()->utype === 'ADM')
                        <div style="display: flex; justify-content: space-between">
                            <button> <a href="/admin/editproduct/{{ $product->id }}">Edit product</a> </button>  
                            <form action="/admin/deleteproduct/{{ $product->slug }}" method="get" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @method('delete')  
                                @csrf  
                                    <button class="delete">Delete product</button>
                            </form>
                        </div>
                    @elseif (Auth::user()->utype === 'USR')
                        <form class="item_input"> 
                            {{-- <input type="number" name="chicken" size="5" value="1" class="quantity"> --}}
                            <button name="add" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})"> Add </button>
                        </form>
                    @endauth
                    @else 
                        <form class="item_input" action="{{route('login')}}" onsubmit="return confirm('You have to login first before adding product to cart!')"> 
                            {{-- <input type="number" name="chicken" size="5" value="1" class="quantity"> --}}
                            <button name="add"> Add </button>
                        </form>
                    @endif
                </div>

                @endforeach
            </div>      
        </div>

    <footer>
        <p>© Copyright 2021 Bajrai Mini Market, Inc.</p>
    </footer>
    </body>
</html>


