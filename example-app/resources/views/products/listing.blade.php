@extends('app')

@section('content')

<div class="row justify-content-around">
    <div class="col-4">
        Products
    </div>
    <div class="col-4">
        <button onclick="addProduct();" class="btn btn-primary btn-sm pull-right">Add Product</button>
    </div>
</div>

<div id="js_add_product">
        
</div>

<div id="listing-products">
@foreach ($products as $product)
    @include('products.listingItem')
@endforeach
</div>

@endsection
