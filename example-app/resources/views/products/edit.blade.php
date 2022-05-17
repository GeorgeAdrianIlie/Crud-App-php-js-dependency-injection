<form class="row justify-content-center pb-3 pt-3 border text-center" id="edit_product_{{$product->id}}" action="">   
<div class="col-3">
        <input type="text" name="name" value="{{$product->name}}" onkeydown="removeErr('p_name_err_{{$product->id}}')">
        <span id='p_name_err_{{$product->id}}' class="text-danger"></span>
    </div>
    <div class="col-3">
        <input type="text" name="quantity" value="{{$product->quantity}}" onkeydown="removeErr('p_quantity_err_{{$product->id}}')">
        <span id='p_quantity_err_{{$product->id}}' class="text-danger"></span>
    </div>
    <div class="col-3">
        <select name="category_id" id="" onchange="removeErr('p_category_err_{{$product->id}}')">
            @foreach($categories as $category)
                <option value="{{$category->id}}" 
                    @if($category->id == $product->category_id) selected @endif >{{$category->name}}</option>
            @endforeach
        </select>
        <span id='p_category_err_{{$product->id}}' class="text-danger"></span>
    </div>
    <div class="col-3">
        <button type="button" class="btn btn-sm btn-primary" onclick="updateProduct('{{$product->id}}');">
            Save
        </button>
        <button type="button" class="btn btn-sm btn-danger" onclick="removeProductDom('{{$product->id}}');">
            Cancel
        </button>
    </div>
</form>