<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;

class ProfileController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        
        foreach ($orders as $order) {
            $order->total = 0;
        }
        return view('profile')->with('orders',$orders);
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'address' => 'required',
            'phone_number' => 'required',
        ]);
        
        $user = $request->user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->save();
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'old_password' => [ 'required',
                function ($attribute, $value, $fail) use ($user)
                {
                    if (Hash::check($value, $user->password) == false) {
                        $fail('The ' . $attribute . ' is not match.');
                    }
                }
            ],
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response([
            'success' => true
        ]);
    }
    
    public function purchaseHistory()
    {
        $orders = Order::where('user_id', Auth::user()->id)->latest()->get();
        
        foreach ($orders as $order) {
            $order->total = 0;
            $order->items = OrderDetail::where('order_id', $order->id)->get();
        }
        return view('purchase_history')->with('orders',$orders);
    }
}
