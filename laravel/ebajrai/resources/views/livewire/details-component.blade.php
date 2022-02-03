<!DOCTYPE html>
<html> 
<head>
    <title> E-Bajrai Mini Market | Product-{{$product->name}} </title>
    <style>
        footer{
            position: relative;
        }
    </style> 
</head>
<body> 
    <div class="title">
        <b> {{$product->name}} </b>
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
            </ul>
            @auth
                    @if(Auth::user()->utype === 'ADM')
                    <br><div style="display: flex"><button class="btn" style="font-size: 15px"> <a href="admin_addproduct.html">Add New Product</a> </button></div>
                    @endif
                @else
                <div class="user"> <a href="{{ route('login') }}"><img src="{{ asset('images/userlogin.png') }}" width="50pixels"></a> </div>   
                @endif 

        </div>
        
        
        <div class="right_content"> 
            
            <div class="description_box">
                <img src="{{ asset('images') }}/{{$product->image}}" style="width: 400px; height: 400px" class="center">
                <h2> Product Information </h2> 
                <hr> 
                <b> DESCRIPTION </b> <br>
                    {{$product->description}}
                <br> <br> <hr>
                <b> PACKING SIZE</b> <br>
                    {{$product->packing}}
                <br> <br> <hr>
                <b> PRICE </b> <br>
                    RM {{$product->price}} each
                <br> <br> <hr>
                @auth
                    @if(Auth::user()->utype === 'ADM')
                        <b> Product Placement </b> <br>
                            {{$product->productPlacement}}
                        <br> <br> <hr>
                    @elseif (Auth::user()->utype === 'USR')
                        <form class="item_input_des" style="text-align: right"> 
                            <button class="button_des" name="add" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})"> Add to Cart </button>
                            <br>
                            Quantity: {{$product->quantity}} pcs available <span style="color:red"> (*{{$product->stock_status}}) </span>
                        </form>
                @endauth
                    @else
                        <form class="item_input_des" style="text-align: right" action="{{route('login')}}" onsubmit="return confirm('You have to login first before adding product to cart!')"> 
                            <button class="button_des" name="add"> Add to Cart </button>
                            <br>
                            Quantity: {{$product->quantity}} pcs available <span style="color:red"> (*{{$product->stock_status}}) </span>
                        </form>
                    @endif
            </div>
            <br><br>
        </div>
        <br><br>
    </div>
</body>