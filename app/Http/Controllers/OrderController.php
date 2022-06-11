<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Validation\Rule;
use App\Mail\NewOrder;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{    
    public function create()
    {
        $user = Auth::user();
        $order_options = Package::all();
        return view('order.create')->with([
            'order_options' => $order_options,
            'user' => $user,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);
        if($request->save_data) {
            $user = User::find($request->user()->id);
            $user->name = $request->name;
            $user->address = $request->address;
            $user->phone_number = $request->phone_number;
            $user->save();
        }
        $order = Order::create([
            'user_id' => $request->user()->id,
            'buyer_name' => $request->name,
            'buyer_address' => $request->address,
            'buyer_phone_number' => $request->phone_number,
            'status' => 'waiting',
        ]);
        $order_id = $order->id;
        $order_item = json_decode($request->order_item);

        for ($index=0; $index < count($order_item); $index++) { 
            $package = Package::find($order_item[$index]->package_id);
            
            $order_detail = OrderDetail::create([
                'order_id' => $order_id,
                'package_id' => $package->id,
                'description' => $order_item[$index]->description,
            ]);
            $order_detail->addMediaFromRequest('photo_' . $index)->toMediaCollection('images');
        }
        
        $admin = User::where('is_admin', 1)->get();
        foreach ($admin as $recipient) {
            Mail::to($recipient->email)->send(new NewOrder());
        }
    }

    public function show($id)
    {
        $user = Auth::user();
        $order = Order::find($id);
        $this->authorize('view', $order);
        
        $order->user = User::find($order->user_id);
        $order->detail = OrderDetail::all()->where('order_id', $id);
        $order->payment_photo = PhotoResource::collection($order->media);

        foreach ($order->detail as $order_detail) {
            $order_detail->package = Package::find($order_detail->package_id)->only('name', 'description');
            $order_detail->photo = PhotoResource::collection($order_detail->media);
        }

        return view('order.show')->with([
            'order' => $order, 
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $this->authorize('update', $order);
        
        $order = Order::find($id);
        $request->validate([
            'status' => 'required',
        ]);

        $order->status->update($request->status);
        $order->save();

        return redirect()->action([OrderController::class, 'index']);
    }

    public function updatePayment(Request $request, $id)
    {
        $order = Order::find($id);
        $this->authorize('updatePayment', $order);
        
        $request->validate([
            'payment_photo' => 'required|image',
        ]);

        $media = $order->addMediaFromRequest('payment_photo')->toMediaCollection('images');
        return new PhotoResource($media);

        $order->payment_photo = true;
        $order->save();
    }

    public function updateReceipt(Request $request, $id)
    {
        $order = Order::find($id);
        $this->authorize('updateStatus', $order);
        
        $request->validate([
            'receipt' => 'required',
        ]);
        
        $order->receipt_number = $request->receipt;
        $order->save();
    }
    public function updatePrice(Request $request, $id)
    {
        $order = Order::find($id);
        $this->authorize('updateStatus', $order);
        
        $order->delivery_fee = $request->deliveryFee;
        $order->save();
        
        $order->detail = OrderDetail::where('order_id', $id)->get();

        for ($index=0; $index < count($request->itemPrice); $index++) { 
            $item = $order->detail[$index];
            $item->price = $request->itemPrice[$index];
            $item->save();
        }
    }

    public function updateStatus($id)
    {
        $order = Order::find($id);

        $this->authorize('updateStatus', $order);

        if ($order->status == 'waiting') {
            $new_status = 'confirm';
        }
        if ($order->status == 'confirm') {
            $new_status = 'process';
        }
        if ($order->status == 'process') {
            $new_status = 'finish';
        }

        $order->status = $new_status;
        $order->save();

        return redirect()->action([OrderController::class, 'show'], ['order' => $order->id]);
    }

    public function getOrderImage($id)
    {
        $order_detail = OrderDetail::find($id);
        $photo = PhotoResource::collection($order_detail->media);
        return response()->json($photo);
    }
}
