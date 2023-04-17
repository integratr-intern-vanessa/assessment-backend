<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {
        $products= Product::all();

        return response()->json($products,200);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $payload = $this->payload($request);

        $product = Product::create($payload);

        return response()->json($product,200);
    }

    public function show($id)
    {
        $product = Product::where ('id',$id)->first();
        return response()->json($product,200);
    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {
        $payload = $this->payload($request);

        $product = Product::where ('id',$id)->first();

        $product->update($payload);

        return response()->json($product,200);

    }
    public function delete($id)
    {
        $product = Product::where ('id',$id)->first();
        $product->delete();
        return response('',200);
    }

    public function payload($request){
        return $this->validate($request,[
            'product_name' => ['required'],
            'quantity'=>['required']
        ]);
    }
}
