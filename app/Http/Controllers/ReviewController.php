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
            // $old_media = PhotoResource::collection($review->media);
            // $test = $old_media[0]->id;
            
            // $out = $old_media[0]->getPath(); //Media::find($test)->delete();
            // // $out = pathinfo($old_media[0]->getPath(), PATHINFO_DIRNAME);
            // Storage::delete($test);
            // return response()->json($out);
            // $old_photo = $old_media[0]->getPath();
            

            $review->media()->delete();
            // Media::where('id', $request->media_id)->each()->delete();
            $media = $review->addMediaFromRequest('photo')->toMediaCollection('images');
            
            new PhotoResource($media);
        }
        // if($request->file('photo')) {
        //     $photo_path = $request->file('photo')->store('review-photos');
        //     $review->photo_path = $photo_path;

        //     Storage::delete($old_photo);
        // }

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
    public function dashboard()
    {
        $this->authorize('dashboard', Review::class);
        $reviews = Review::all();
        foreach ($reviews as $review) {
            $review->photo_path = PhotoResource::collection($review->media);
        }

        return view('dashboard.review')->with('reviews',$reviews);
    }
}
