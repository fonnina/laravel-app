<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
        return new ProductCollection( $products);
       // return CollectionResource::collection($collections);
       // return response()->json(Collection::all());
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
        $val= Validator::make($request->all(),[
           'name'=>'required|string',
            'material'=>'required',
            'description'=>'required',
            'collection_id'=>'required'
        ]);
        if($val->fails())
            return response()->json($val->errors());
        $prod=Product::create([
            'name'=>$request->name,
            'material'=>$request->material,
            'description'=>$request->description,
            'collection_id'=>$request->collection_id,

        ]);

       return response()->json(['Product is created!', new ProductResource($prod)]);


    }

    /**
     * Display the specified resource.
     *
     * @param + \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Product $prod)
    {
        return new ProductResource($prod);
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

    public function update(Request $request, $id )
    {
        $val= Validator::make($request->all(),[
            'name'=>'required|string',
             'material'=>'required',
             'description'=>'required',
             'collection_id'=>'required'
         ]);
         if($val->fails())
             return response()->json($val->errors());
             $prod= Product::find($id);
             $prod-> update($request->all());
             return $prod;

    }


    public function destroy($id) //Product $prod
    {

         return Product::destroy($id);



    }

}
