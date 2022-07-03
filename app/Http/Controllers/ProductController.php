<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Media;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|min:0|integer',
        ]);

        $product = Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image',
            ]);
            $media = $product->addMediaFromRequest('photo')->toMediaCollection('images');
            return new PhotoResource($media);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products,code,'.$request->id,
            'name' => 'required',
            'price' => 'required|min:0|integer',
        ]);
        
        $product = Product::find($request->id);
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image',
            ]);
            $old_photos = PhotoResource::collection($product->media);
            if (count($old_photos)) {
                foreach($old_photos as $old_photo) {
                    $old_photo->delete();
                };
            }
            $media = $product->addMediaFromRequest('photo')->toMediaCollection('images');
            
            new PhotoResource($media);
        }

        $product->code = $request->code;       
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
    }

    public function destroy($id)
    {
        $this->authorize('delete', Review::class);
        
        $review = Product::find($id);        
        $review->delete();
        $review->media()->delete();
    }
}
