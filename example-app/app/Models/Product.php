<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
    protected $fillable = [
        'name',
        'quantity',
        'category_id'
    ];

    public function category(){
        
        return $this->belongsTo(Category::class);
    }

    public function getItem($id){
        return $this->with('category')->find($id);
    }

    public function storeItem($data){
        $product = $this->create($data);

        return $product;
    }

    public function updateItem($id, $data){
        $product = $this->getItem($id);
        $product->update($data);

        return $product;
    }

    public function removeItem($id){
        $product = $this->getItem($id);
        $product->delete();

        return $product;
    }

    public function cancelEdit($id){
        $product = $this->getItem($id);

        return $product;
    }
}

