<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        Product $product,
        Category $category
    )
    {
        $this->product = $product;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->orderBy('created_at', 'DESC')->get();

        return view('categories.listing', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $category = $this->category->storeItem($data);
        // $category = new Category();
        // // $category->name = $data['name'];
        // $category = $category->create([
        //     "name" => $data["name"]
        // ]);

        return view('categories.listingItem', compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->getItem($id);
        // $category = Category::where('id', $id)->first();
        // returnezi view de edit
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = $this->category->updateItem($id, $data);
        // $category = Category::where('id', $id)->first();
        // $category->name = $data['name'];
        // $category->save();
        
        return view('categories.listingItem', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wasDeleted =$this->category->removeItem($id);
        // $category = Category::find($id);
        // if ( $category->delete() ){
        //     return true;
        // }
        return response()->json([
            "status" => $wasDeleted ? true : false
        ]);
        // return false;
        // return view('categories.listingItem', compact('category'));
    }

    public function cancelEdit($id)
    {
        $category = $this->category->cancelEdit($id);
        // $category = Category::where('id', $id)->first();

        return view('categories.listingItem', compact('category'));
    }

}
