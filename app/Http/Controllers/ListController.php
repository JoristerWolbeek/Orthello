<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
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
        session()->forget('last_login');
        $products = Product::with('user')->get();
        return view('list.index', compact(["products"]));
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
        dd("test");
        //  $validatedData = $request->validate(
        //     [
        //     'name' => ['required', "string", 'max:255'],
        //     'id' => ['required', "integer"],
        //     ]
        // );
        // Product::updateOrInsert(
        //     ['name' => ucfirst(strtolower($validatedData["name"]))],
        //     ["user_id" => $validatedData["id"], "on_list" => true, "updated_at" => now()]
        // );

        $products = Product::with('user')->get();
        return back()->with(compact(["products"]));
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
            'id' => ['required', "integer"],
            ]
        );

        Product::where("id", $request->id)->update(["on_list" => false]);
        $products = Product::with('user')->get();
        return back()->with(compact(["products"]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
