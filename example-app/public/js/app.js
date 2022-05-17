$( document).ready(function() {

	$.ajaxSetup({
			headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

});

function addCategory(){

    // ajax call 
    $.get('categories/create', {}, function(data) {
        $('#js_add_category').html(data).addClass('form-group')
    })
    // return pe response template cu replace pe bucata de html din listing (js_add_category)
    // console.log("here");
}

function storeCategory(){
    let categoryName = $('#category-name').val();

    if (categoryName.length > 0){
        const data = {
            'name': categoryName,
        }
    
        $.post('categories', data, function(response){
            $('#listing-categories').prepend(response)
            $('#add_category').remove();
        } )
    }else{
        $("#category-error").text("Category is null");
    }

}

function removeWarning(){
    $('#category-error').text("");
}

function editCategory(id){
    // deschide un formular
    $.get(`categories/${id}/edit`, {}, function (data){
        $(`#listing_category_${id}`).replaceWith(data).addClass('form-group');
    })
}


function updateCategoryName(id){
    // trebuie revizuit
    let newCategoryName = $(`#edit_category${id}`).val();

    if (newCategoryName.length > 0){
        const data = {
            'name': newCategoryName,
        } 
        $.ajax({
            url: `categories/${id}`,
            type: 'PUT',
            data: data,
            success: function(html) {
                $(`#edit_category_${id}`).replaceWith(html);
            }
        });
    }else{
            $("#category-error").text("Category is null");
        }
}

function removeCategoryDom(id = null) {
    if(id == null || id == undefined){
        $('#add_category').remove();
    }else{
        $.get(`/cancel-edit-category/${id}`, {}, function(response){
            $(`#edit_category_${id}`).replaceWith(response);
        });
    }
}


// function removeAddCategory(){
//     $('#add_category').remove();
// }

// function removeEditCategory(id){
   
//     $.get(`/cancel-edit-category/${id}`, {}, function(response){
//         $(`#edit_category_${id}`).replaceWith(response);
//     });
// }

function deleteCategory(id){
    $.ajax({
        url: `categories/${id}`,
        type: 'DELETE',
        data: {},
        success: function(response){
            if(response.status){
                $(`#listing_category_${id}` ).remove();
            }
        }
    });
}

function addProduct(){
    $.ajax({
        url: 'products/create',
        type: 'GET',
        data: {},
        success: function(response){
            $('#js_add_product').html(response).addClass('form-group');
        }
    });
}

function createProduct() {
    const data = $("#add_product").serializeArray();

    let error_report = false;
    
    if(data[0]['value'] == null || data[0]['value'] == ""){
        $('#p_name_err').text('Name is required!')
        error_report = true;
    }
    
    if(data[1]['value'] == null || data[1]['value'] == ""){
        $('#p_quantity_err').text('Quantity is required!')
        error_report = true;
    }
    
    if(data[2]['value'] == null || data[2]['value'] == ""){
        $('#p_category_err').text('Category is required!')
        error_report = true;
    }

    if(!error_report){
        $.ajax({
            url: 'products',
            type: 'POST',
            data: data,
            success: function(response){
                if(response){
                    $('#listing-products').prepend(response);
                    $('#add_product').remove();
                }
            }
        });

    }

}

function removeErr(param){
    $(`#${param}`).text('')
}


function editProduct(id){

    $.ajax({
        url: `products/${id}/edit`,
        type: 'GET',
        data: {},
        success: function(response){
            $(`#listed_product_${id}`).replaceWith(response);
        }
    })
}

function updateProduct(id) {
    const data = $(`#edit_product_${id}`).serializeArray();

    let error_report = false;
    
    if(data[0]['value'] == null || data[0]['value'] == ""){
        $(`#p_name_err_${id}`).text('Name is required!')
        error_report = true;
    }
    
    if(data[1]['value'] == null || data[1]['value'] == ""){
        $(`#p_quantity_err_${id}`).text('Quantity is required!')
        error_report = true;
        console.log("here");
    }
    // debugger
    
    if(data[2]['value'] == null || data[2]['value'] == ""){
        $(`#p_category_err_${id}`).text('Category is required!')
        error_report = true;
    }

    if(!error_report){
        $.ajax({
            url: `products/${id}`,
            type: 'PUT',
            data: data,
            success: function(response){
                $(`#edit_product_${id}`).replaceWith(response);
            }
        })
    }
    
}

function removeProductDom(id = null) {
    if(id == null || id == undefined){
        $('#add_product').remove();
    }else{
        $.ajax({
            url: `/cancel-edit-product/${id}`,
            type: 'GET',
            data: {},
            success: function(response){
                $(`#edit_product_${id}`).replaceWith(response);
            }
        })
    }
}

// function cancelCreateProduct(){
//     $('#add_product').remove();
// }

// function cancelEditProduct(id){
//     $.ajax({
//         url: `/cancel-edit-product/${id}`,
//         type: 'GET',
//         data: {},
//         success: function(response){
//             $(`#edit_product_${id}`).replaceWith(response);
//         }
//     })
// }

function deleteProduct(id){
    
    $.ajax({
        url: `products/${id}`,
        type: 'DELETE',
        data: {},
        success: function(response){
            if(response){
                $(`#listed_product_${id}`).remove();
            }
        }
    })
}