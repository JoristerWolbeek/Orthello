<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Product::where('name', 'LIKE', '%' . $query . '%')->get();
          return response()->json($filterResult);
    }
}
