<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\ImageManagerStatic as Image;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view("product.index", compact(["products"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
            'id' => ['required', "integer"],
            ]
        );
        new Product()
        //make a new product where request name is name
        Product::where("id", $request->id)->update(["on_list" => false]);
        $products = Product::with('user')->get();
        return back()->with(compact(["products"]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate(
            [
            'id' => 'required|integer',
            'name' => 'required|string|unique:products,name',
            'image' => 'nullable|mimes:jpeg,jpg,png',
            ]
        );
        if(isset($validatedData["image"])){
            $validatedData["image"] = Image::make($validatedData["image"])->resize(250, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('data-url');
            Product::findOrFail($validatedData["id"])->update(['name'=>ucfirst(strtolower($validatedData["name"])), "image"=>$validatedData["image"]]);

        }else{
             Product::findOrFail($validatedData["id"])->update(['name'=>ucfirst(strtolower($validatedData["name"]))]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
           $validatedData = $request->validate(
            [
            'id' => ['required', "integer"],
            ]
        );
        Product::destroy($validatedData["id"]);
        return back();
    }
}
