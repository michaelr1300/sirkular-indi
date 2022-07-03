<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Product;
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
        foreach ($packages as $package) {
            $package->photo_path = PhotoResource::collection($package->media);
        }

        $items = Product::all();
        foreach ($items as $product) {
            $product->photo_path = PhotoResource::collection($product->media);
        }
        $collection = collect($items);
        $sorted = $collection->sortBy('code');
        $products = $sorted->values()->all();

        return view('catalog.index')->with([
            'packages' => $packages,
            'products' => $products
        ]);
    }
}