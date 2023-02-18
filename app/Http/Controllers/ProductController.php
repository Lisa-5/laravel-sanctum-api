<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//: Response
    {
      return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//: Response
    {
      $request->validate([
        'name' => 'required',
        'slug' => 'required',
        'price' => 'required'
      ]);

      return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        $product = Product::find($id);
        $product->update($request->all);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)//: Response
    {
        return Product::destroy($id);
    }

    /**
     * Search for a name.
     */
    public function search($name): Response
    {
        return Product::where($name, 'like', '%'.$name.'%')->get();
    }
}
