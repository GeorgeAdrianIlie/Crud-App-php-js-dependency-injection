<div class="row justify-content-center pb-3 pt-3 border text-center" id="listing_category_{{$category->id}}">

    <div  class="col-sm-6 ">
        {{$category->name}}
    </div>
    <div class="col-sm-6">
        <button class="btn btn-info btn-sm" onclick="editCategory('{{$category->id}}')">
            Edit
        </button>
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-category{{$category->id}}">
            Delete
        </button>
    </div>


            <!-- Modal -->
            <div class="modal fade" id="delete-category{{$category->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="delete-category" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteCategory">Deleting category...  :( </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                       <H2> Do you wnat to delete the category "<span>{{$category->name}}</span>" ?</H2> 
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                            <button type="button" class="btn btn-primary" onclick="deleteCategory('{{$category->id}}')" data-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>