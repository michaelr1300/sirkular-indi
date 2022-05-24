<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewPhotoResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::take(15)->get();

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
            'photo' => 'image'
        ]);

        $photo_path = '';
        // if($request->file('photo')) {
        //     $photo_path = $request->file('photo')->store('review-photos');
        // }

        $review = Review::create([
            'photo_path' => $photo_path,
            'content' => $request->content,
            'reviewer_name' => $request->reviewer_name,
        ]);

        $media = $review->addMediaFromRequest('photo')->toMediaCollection('images');

        // $path = ReviewPhotoResource::collection($review->media);
        // $review->photo_path = $path[0]->url;
        // $review->save();
        return new ReviewPhotoResource($media);
        // if($request->hasFile('photo')){
        //     $photo_path = $review->addMediaFromRequest('photo')->toMediaCollection('review-photos');
        // }
    }

    public function update(Request $request)
    {
        $review = Review::find($request->id);

        $old_photo = $review->photo_path;
        
        if($request->file('photo')) {
            $photo_path = $request->file('photo')->store('review-photos');
            $review->photo_path = $photo_path;

            Storage::delete($old_photo);
        }

        $review->content = $request->content;
        $review->reviewer_name = $request->reviewer_name;
        $review->save();
    }

    public function destroy($id)
    {
        $this->authorize('delete', Review::class);
        
        $review = Review::find($id);

        if ($review->photo_path) {
            Storage::delete($review->photo_path);
        }
        
        $review->delete();


    }
    public function dashboard()
    {
        $this->authorize('dashboard', Review::class);
        $reviews = Review::all();
        foreach ($reviews as $review) {
            $review->photo_path = ReviewPhotoResource::collection($review->media);
        }

        return view('dashboard.review')->with('reviews',$reviews);
    }
}
