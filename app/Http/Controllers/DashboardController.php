<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Review;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    
    public function order()
    {
        $this->authorize('dashboard', Order::class);
        $packages = Package::all();
        $orders = Order::latest()->get();
        foreach ($orders as $order) {
            $order->payment_photo = PhotoResource::collection($order->media);
            $order->items = OrderDetail::where('order_id', $order->id)->get();
        }
        return view('dashboard.order')->with(['orders' => $orders, 'packages' => $packages]);
    }

    public function product()
    {
        $this->authorize('dashboard', Package::class);
        $packages = Package::all();
        foreach ($packages as $package) {
            $package->photo_path = PhotoResource::collection($package->media);
        }
        return view('dashboard.product')->with('packages', $packages);
    }

    public function review()
    {
        $this->authorize('dashboard', Review::class);
        $reviews = Review::all();
        foreach ($reviews as $review) {
            $review->photo_path = PhotoResource::collection($review->media);
        }

        return view('dashboard.review')->with('reviews', $reviews);
    }

    public function user()
    {
        $this->authorize('dashboard', Package::class);
        $users = User::all();
        return view('dashboard.user')->with('users', $users);
    }
}
