<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();

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
        if($request->file('photo')) {
            $photo_path = $request->file('photo')->store('review-photos');
        }

        Review::create([
            'photo_path' => $photo_path,
            'content' => $request->content,
        ]);
    }

    public function update(Request $request)
    {
        $photo_path = $request->photo_path;
        if($request->file('photo')) {
            $photo_path = $request->file('photo')->store('review-photos');
        }

        $review = Review::find($request->id);
        
        $review->content = $request->content;
        $review->photo_path = $photo_path;
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

        return view('dashboard.review')->with('reviews',$reviews);
    }
}
