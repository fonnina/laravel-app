<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
class DesignerCollectionControler extends Controller
{
    public function index($designer_id)
    {
         $collections = Collection::get()->where('designer_id',$designer_id);
         if(is_null($collections))
            return response()->json('Does not exist',404);
         return response()->json($collections);

    }
}
