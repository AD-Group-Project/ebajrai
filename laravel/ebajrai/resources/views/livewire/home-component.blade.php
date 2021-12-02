<!DOCTYPE html>
    <html> 
    <head>
        <title> E-Bajrai Mini Market | All Item </title>
        <style>
            footer
            {
                position: relative;
            }
        </style> 
    </head>
    <body>

    <div class="title">
                <b> All Item</b>
            </div>
            
            <div class="content">
                
                <div class="left_content"> 
                    
                    <b> Category </b> <br>
                    <ul>
                    @foreach ($categories as $category) 
                        <li> <a href="{{ route('product.category',['category_slug'=>$category->slug]) }}" style="color: #268147"> {{ $category->name }} </a> </li>
                    @endforeach
                    </ul>
                    @auth
                        @if(Auth::user()->utype === 'ADM')
                            <br><div style="display: flex"><button class="btn" style="font-size: 15px"> <a href="{{ route('admin.add') }}">Add New Product</a> </button></div>
                        @endif    
                    @endauth

                </div>
                
                
                <div class="right_content">
                    @foreach ($products as $product) 
                    
                    <div class="item">
                        <img src="{{ asset('images') }}/{{ $product->image }}" style="width: 170px; height: 170px" class="center">
                        <b> {{ $product->name }} </b> <br>
                        <a href="{{route('product.details',['slug'=>$product->slug])}}" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM {{ $product->price }} </div>
                        @auth
                         @if (Auth::user()->utype === 'ADM')
                            <div style="display: flex; justify-content: space-between">
                                <button> <a href="/admin/editproduct/{{ $product->id }}">Edit product</a> </button>
                                <button class="delete"> <a href="" style="color: darkslategray;">Delete product</a> </button>
                            </div>
                         @elseif (Auth::user()->utype === 'USR')
                            <form class="item_input"> 
                                <input type="number" name="chicken" size="5" value="1" class="quantity">
                                <button name="add" onclick="addedtocart()"> Add </button>
                            </form>
                        @endauth
                         @else 
                         <form class="item_input"> 
                            <input type="number" name="chicken" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                        @endif
                    </div>

                    @endforeach
                </div>      
            </div>
        </body>      
    </html>