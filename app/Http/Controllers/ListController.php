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
        session()->forget('last_login');
        $products = Products::with('user')->get();
        return view('shoppinglist', compact(["products"]));
    }

    public function delete(request $req)
    {
        $validatedData = $req->validate(
            [
            'id' => ['required', "integer"],
            ]
        );

        Products::where("id", $req->id)->update(["on_list" => false]);
        $products = Products::with('user')->get();
        return back()->with(compact(["products"]));
    }

    public function add(request $req)
    {
        $validatedData = $req->validate(
            [
            'name' => ['required',"unique:pgsql.products,name,except,on_list", 'max:255'],
            'id' => ['required', "integer"],
            ]
        );
        Products::updateOrInsert(
            ['name' => ucfirst(strtolower($validatedData["name"]))],
            ["user_id" => $validatedData["id"], "on_list" => true, "updated_at" => now()]
        );
        $products = Products::with('user')->get();
        return back()->with(compact(["products"]));
    }
}
