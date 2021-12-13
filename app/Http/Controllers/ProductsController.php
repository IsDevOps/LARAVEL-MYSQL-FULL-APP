<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Products $model)
    {
        return view('products.index', ['products' => $model->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = DB::table('products_type')->pluck('name', 'id')->toArray();
        return view('products.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Products $model)
    {
        $request->merge(['price' => str_replace(',', '.', str_replace('.', '', $request->price))]);
        $model->create($request->except('_token'));
        return redirect()->route('products.index')->withStatus(__('Product successfully created!'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $type = DB::table('products_type')->pluck('name', 'id')->toArray();
        return view('products.create', compact('product', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $request->merge(['price' => str_replace(',', '.', str_replace('.', '', $request->price))]);
        $product->update($request->except('_token', 'created_by'));
        return redirect()->route('products.index')->withStatus(__('Product successfully updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index')->withStatus(__('Product successfully deleted!'));
    }
}
