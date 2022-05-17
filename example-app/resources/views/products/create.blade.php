<form class="row justify-content-center pb-3 pt-3 border text-center" id="add_product" action="">
    <div class="col-3">
        <input type="text" name="name" placeholder="Name" onkeydown="removeErr('p_name_err')">
        <span id='p_name_err' class="text-danger"></span>
    </div>
    <div class="col-3">
        <input type="text" name="quantity" placeholder="Quantity" onkeydown="removeErr('p_quantity_err')">
        <span id='p_quantity_err' class="text-danger"></span>
    </div>
    <div class="col-3">
        <select name="category_id" id="" onchange="removeErr('p_category_err')">
            <option value="">Select category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <span id='p_category_err' class="text-danger"></span>
    </div>
    <div class="col-3">
        <button type="button" class="btn btn-sm btn-primary" onclick="createProduct();">
            Save
        </button>
        <button type="button" class="btn btn-sm btn-danger" onclick="removeProductDom();">
            Cancel
        </button>
    </div>
</form>