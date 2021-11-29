<!DOCTYPE html>
<html> 
<head>
    <title> E-Bajrai Mini Market | Product-{{$product->name}} </title>
    <style>
        
    </style> 
</head>
<body> 
    <div class="title">
        <b> {{$product->name}} </b>
    </div>

    <div class="content">
        
        <div class="left_content"> 
            
            <b> Category </b> <br>
            <ul>
            @foreach ($categories as $category) 
                <li> <a href="{{ route('product.category',['category_slug'=>$category->slug]) }}" style="color: #268147"> {{ $category->name }} </a> </li>
            @endforeach
            </ul>

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
                 
                <form class="item_input_des" style="text-align: right"> 
                    <input type="number" name="apple" size="5" value="1" class="quantity_des">
                    <button class="button_des" name="add" onclick="addedtocart()"> Add to Cart </button>
                    <br>
                    Quantity: {{$product->quantity}} pcs available <span style="color:red"> (*{{$product->stock_status}}) </span>
                </form>
            </div>
        
        </div>
        
    </div>
</body>
