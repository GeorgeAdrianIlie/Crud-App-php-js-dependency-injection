@extends('app')

@section('content')
<div class="row justify-content-around">
    <div class="col-4">
        Categories
    </div>
    <div class="col-4">
        <button onclick="addCategory();" class="btn btn-primary btn-sm pull-right">Add Category</button>
    </div>
</div>

    <div id="js_add_category">
        
    </div>
    

    <div id="listing-categories">
        @foreach ($categories as $category)
            @include('categories.listingItem')
        @endforeach
    </div>

    
@endsection