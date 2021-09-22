<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product as Products;

class ListController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Products::with('user')->get();
        return view('shoppinglist', ["products"=>$products]);
    }

    public function delete(request $req)
    {
        Products::where("id", $req->id)->update(["on_list"=>false]);        
        $products = Products::with('user')->get();
        return view('shoppinglist', ["products"=>$products]);
    }

    public function add(request $req)
    {
        DB::table("products")->updateOrInsert(
            ['name' => ucfirst(strtolower($req->name))],
            ["user_id"=>$req->id, "on_list"=>true, "updated_at"=>now()]
        );
        $products = Products::with('user')->get();
        return view('shoppinglist', ["products"=>$products]);
    }
}
