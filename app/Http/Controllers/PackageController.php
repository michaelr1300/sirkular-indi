<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();

        return view('catalog.index')->with('packages',$packages);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|min:0|integer'
        ]);

        // $photo_path = '';
        // if($request->file('image')) {
        //     $photo_path = $request->file('image')->store('package-photos');
        // }

        Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        // return redirect()->action([PackageController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id);
        var_dump($package);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $package = Package::find($id);
        
        $package->name = $request->name;
        $package->price = $request->price;
        $package->description = $request->description;
        $package->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function catalog()
    {
        $packages = Package::all();

        return view('catalog.index')->with('packages',$packages);
    }
    public function dashboard()
    {
        $this->authorize('dashboard', Package::class);
        $packages = Package::all();
        return view('dashboard.product')->with('packages',$packages);
    }
}
