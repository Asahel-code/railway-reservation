<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContainerSize;

class ContainerSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $container_sizes = ContainerSize::get();
        return view('layouts.admin.container-size',['container_sizes' => $container_sizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.add.add-container-size');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'container_name' => 'required',
            'container_price' => 'required'
        ]);

        $container = $request->input('container_name');
        $price = $request->input('container_price');

        $container_size = new ContainerSize;
        $container_size->name = $container;
        $container_size->price = $price;

        $container_size->save();

        return redirect()->route('container-size.index')->withSuccess('A new container size has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $container_size = ContainerSize::where('id', $id)->first();

        return view('layouts.admin.edit.edit-container-size',['container_size'=> $container_size]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'container_name' => 'required',
            'container_price' => 'required'
        ]);

        $container = $request->input('container_name');
        $price = $request->input('container_price');

        ContainerSize::where('id', $id)->update([
            'name' => $container,
            'price' => $price
        ]);

        return redirect()->route('container-size.index')->withSuccess('A container size has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContainerSize::where('id', $id)->delete();

        return redirect()->route('container-size.index')->withSuccess('A container size has been deleted successfully');
    }
}
