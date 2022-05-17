
    <form class="row pb-5 pt-5 border" id="add_category" action="">
        <!-- @csrf -->
        <div class="col-6">
            <input type="text" name="name" id="category-name" onkeydown="removeWarning();">
            <span class="text-danger" id="category-error"></span>
        </div>
        <div class="col-6">
            <button class="btn btn-primary" type="button" onclick="storeCategory();">Add New</button>
            <button class="btn btn-danger" type="button" onclick="removeCategoryDom();">Cancel</button>
        </div>  
    </form>
