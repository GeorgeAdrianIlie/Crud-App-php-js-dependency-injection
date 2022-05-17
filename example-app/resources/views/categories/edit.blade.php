<div class="row pb-5 pt-5 border" id="edit_category_{{$category->id}}" >
        <div class="col-6">
            <input type="text" name="name" id="edit_category{{$category->id}}" onkeydown="removeWarning();" value="{{$category->name}}">
            <span class="text-danger" id="category-error"></span>
        </div>
        <div class="col-6">
            <button class="btn btn-primary" type="button" onclick="updateCategoryName('{{$category->id}}');">Save</button>
            <button class="btn btn-danger" type="button" onclick="removeCategoryDom('{{$category->id}}');">Cancel</button>
        </div>  
</div>
