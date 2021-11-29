<div class="wrap-search center-section">
    <div class="wrap-search-form">
        <form action="{{route('product.search')}}" id="form-search-left" name="form-search">
            <input type="text" name="search" value="{{$search}}" placeholder="Search here...">
            <button form="form-search-left" type="submit"><i class="fa fa-searhc" aria-hidden="true"></i></button>
        </form>
    </div>
</div>