<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Review;

class StaticPageController extends Controller
{

    public function home()
    {
        $reviews = Review::latest()->take(3)->get();
        foreach ($reviews as $review) {
            $review->photo_path = PhotoResource::collection($review->media);
        }
        return view('home')->with('reviews',$reviews);
    }
    public function catalog()
    {
        $packages = Package::all();

        return view('catalog.index')->with('packages',$packages);
    }
}