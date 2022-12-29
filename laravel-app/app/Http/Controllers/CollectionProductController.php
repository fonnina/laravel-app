<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class CollectionProductController extends Controller
{
    public function index($collection_id)
    {

        $products = Product::get()->where('collection_id', $collection_id);
        if (is_null($products)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($products);
    }
}
