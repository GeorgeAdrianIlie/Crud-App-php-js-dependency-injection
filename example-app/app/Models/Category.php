<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function getItems(){
        $categories = $this->get();
        
        return $categories;
    }

    public function getItem($id){
        return $this->find($id);
    }
    
    public function storeItem($data){
        $category = $this->create($data);

        return $category;
    }

    public function updateItem($id, $data){
        $category = $this->getItem($id);
        $category->update($data);

        return $category;
    }

    public function removeItem($id){
        $category = $this->find($id);
        if ( $category->delete() ){
            return true;
        }
        return false;
    }

    public function cancelEdit($id){
        $category = $this->where('id', $id)->first();
        
        return $category;
    }

}
