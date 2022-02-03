<div class="title">
    <b> All Item </b>
</div>

<div class="content">
    <title> All Items </title>
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
        <div style="display: flex"><button class="btn" style="font-size: 15px"> <a href="{{ route('admin.add') }}">Add New Product</a> </button></div>

    </div>
    
    
    <div class="right_content" style="border: none"> 
        @if(session()->has('message'))
            <div class="mesej">
                {{ session()->get('message') }}
            </div>
         @endif
        
        @foreach ($products as $product) 
            
            <div class="item">
                <div class="image">
                    <img src="{{ asset('images') }}/{{ $product->image }}" style="width: 170px; height: 170px" class="center">
                </div>
                <b> {{ $product->name }} </b> <br>
                <a href="{{route('product.details',['slug'=>$product->slug])}}" style="font-size: 12px; color: #268147"> Description </a> <br>
                <div style="color: #268147; text-align: center"> RM {{ $product->price }} </div>
                <div style="display: flex; justify-content: space-between">
                    <form action="/admin/editproduct/{{ $product->id }}">
                        <button class="edit">Edit product</a> </button> 
                    </form> 
                    <form action="/admin/deleteproduct/{{ $product->slug }}" method="get" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @method('delete')  
                        @csrf  
                            <button class="delete">Delete product</button>
                    </form>
                </div>
            </div>

        @endforeach

    </div>
    
</div>
