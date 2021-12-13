<?php

namespace App\Http\Controllers;

use App\Models\ProductsType;
use Illuminate\Http\Request;

class ProductsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsType $model)
    {
        return view('products.type.index', ['productsTypes' => $model->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsType $model, Request $request)
    {
        $model->create($request->except('_token'));
        return redirect()->route('products.type.index')->withStatus(__('Type successfully created!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductsType  $productsType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsType $type)
    {
        return view('products.type.create', compact('type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductsType  $productsType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductsType $type)
    {
        $type->update($request->except('_token', 'created_by'));
        return redirect()->route('products.type.index')->withStatus(__('Type successfully updated!'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsType  $productsType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsType $type)
    {
        $type->delete();
        return redirect()->route('products.type.index')->withStatus(__('Type successfully deleted!'));
    }
}
