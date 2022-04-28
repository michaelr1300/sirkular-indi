<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Review;

class StaticPageController extends Controller
{

    public function home()
    {
        $reviews = Review::all()->sortByDesc('id')->take(3);

        return view('home')->with('reviews',$reviews);
    }
    public function catalog()
    {
        $packages = Package::all();

        return view('catalog.index')->with('packages',$packages);
    }
}