<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Media;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::take(15)->get();
        foreach ($reviews as $review) {
            $review->photo_path = PhotoResource::collection($review->media);
        }

        return view('reviews.index')->with('reviews',$reviews);
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $review = Review::create([
            'reviewer_name' => $request->reviewer_name,
            'content' => $request->content,
        ]);

        if($request->hasFile('photo')){
            $media = $review->addMediaFromRequest('photo')->toMediaCollection('images');
            return new PhotoResource($media);
        }
    }

    public function update(Request $request)
    {
        $review = Review::find($request->id);
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image',
            ]);
            $old_photos = PhotoResource::collection($review->media);
            
            if (count($old_photos)) {
                foreach($old_photos as $old_photo) {
                    $old_photo->delete();
                };
            }
            $media = $review->addMediaFromRequest('photo')->toMediaCollection('images');
            
            new PhotoResource($media);
        }

        $review->content = $request->content;
        $review->reviewer_name = $request->reviewer_name;
        $review->save();
    }

    public function destroy($id)
    {
        $this->authorize('delete', Review::class);
        
        $review = Review::find($id);        
        $review->delete();
        $review->media()->delete();
    }
}
