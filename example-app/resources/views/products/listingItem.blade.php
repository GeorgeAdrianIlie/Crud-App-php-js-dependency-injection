<div class="row justify-content-center pb-3 pt-3 border text-center" id="listed_product_{{$product->id}}">
    
    <div class="col-3">
        {{$product->name}}
    </div>
    <div class="col-3">
        {{$product->quantity}}
    </div>
    <div class="col-3">
        {{$product->category->name}}
    </div>
    <div class="col-3">
        <button class="btn btn-sm btn-primary" onclick="editProduct('{{$product->id}}');">
            Edit
        </button>
        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-product">
            Delete
        </button>
    </div>

     <!-- Modal -->
    <div class="modal fade" id="delete-product" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="delete-product" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProduct">Deleting product...  :( </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <H2> Do you wnat to delete the product "<span>{{$product->name}}</span>" ?</H2> 
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                    <button type="button" class="btn btn-primary" onclick="deleteProduct('{{$product->id}}')" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>


</div>