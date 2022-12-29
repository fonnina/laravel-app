<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserCollectionController extends Controller
{
    public function index($user_id)
    {
         $collections = Collection::get()->where('user_id',$user_id);
         if(is_null($collections))
            return response()->json('Does not exist',404);
         return response()->json($collections);

    }
}
