<?php

namespace App\Http\Controllers;
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
            'photo' => 'nullable|image'
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
        $review = Review::find($request->id);

        $old_photo = $review->photo_path;
        
        if($request->file('photo')) {
            $photo_path = $request->file('photo')->store('review-photos');
            $review->photo_path = $photo_path;

            Storage::delete($old_photo);
        }

        $review->content = $request->content;
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
