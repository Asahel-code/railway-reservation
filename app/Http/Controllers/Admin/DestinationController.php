<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::get();
        return view('layouts.admin.destinations', ['destinations' => $destinations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.add.add-destination');
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
            'destination_name' => 'required'
        ]);

        $name = $request->destination_name;
        $image = $request->destination_image;

        if ($image == "") 
        {
            $destination = new Destination;
            $destination->name = $name;

            $destination->save();
            return redirect()->route('destination.index')->withSuccess('A new destination has been added successfully');
        } else {
            $imageName = $image->getClientOriginalName();
            $newImage = time() . $imageName;
            $path = "storage/uploads";
            $image->move($path, $newImage);

            $destination = new Destination;
            $destination->name = $name;
            $destination->image = $newImage;

            $destination->save();

            return redirect()->route('destination.index')->withSuccess('A new destination has been added successfully');
        }
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
        $destination = Destination::where('id', $id)->first();

        return view('layouts.admin.edit.edit-destination', ['destination' => $destination]);
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
            'destination_name' => 'required'
        ]);

        $image = $request->destination_image;
        $name = $request->destination_name;

        $imageName = $image->getClientOriginalName();
        $newImage = time() . $imageName;
        $path = "storage/uploads";
        $image->move($path, $newImage);

        $destination = Destination::where('id', $id);

        if ($request->hasFile('destination_image')) {
            $image_path = "storage/uploads/" . $destination->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $destination->update([
            'name' => $name,
            'image' => $newImage
        ]);

        return redirect()->route('destination.index')->withSuccess('A destination has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Destination::where('id', $id)->delete();

        return redirect()->route('destination.index')->withSuccess('A destination has been deleted successfully');
    }
}
