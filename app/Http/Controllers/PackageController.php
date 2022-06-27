<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Media;

class PackageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'min_price' => 'required|min:0|integer',
            'max_price' => 'required|min:0|integer'
        ]);

        $package = Package::create([
            'name' => $request->name,
            'price' => 0,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'description' => $request->description,
        ]);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image',
            ]);
            $media = $package->addMediaFromRequest('photo')->toMediaCollection('images');
            return new PhotoResource($media);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'min_price' => 'required|min:0|integer',
            'max_price' => 'required|min:0|integer'
        ]);
        $package = Package::find($request->id);
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image',
            ]);
            $old_photos = PhotoResource::collection($package->media);
            if (count($old_photos)) {
                foreach($old_photos as $old_photo) {
                    $old_photo->delete();
                };
            }
            $media = $package->addMediaFromRequest('photo')->toMediaCollection('images');
            
            new PhotoResource($media);
        }
        
        $package->name = $request->name;
        $package->min_price = $request->min_price;
        $package->max_price = $request->max_price;
        $package->description = $request->description;
        $package->save();
    }
    
    public function getAllPackages()
    {
        $packages = Package::all();
        return response()->json($packages);
    }
}
