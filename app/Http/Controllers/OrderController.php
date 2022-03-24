<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $this->authorize('viewAny', Order::class);
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->user = User::find($order->user_id);
        }
        return view('order.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $order_options = Package::all();
        return view('order.create')->with([
            'order_options' => $order_options,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'package_id' => ['required', Rule::exists('packages', 'id')], //['required', Rule::exists('packages', 'id')]->where('isActive', 1)]
            'quantity' => 'required',
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
            'status' => 'waiting',
        ]);
        for ($index=0; $index < count($request->package_id); $index++) { 
            if ($request->quantity[$index]) {
                $price = Package::find($request->package_id[$index])->price;
                
                OrderDetail::create([
                    'order_id' => $order->id,
                    'package_id' => $request->package_id[$index],
                    'quantity' => $request->quantity[$index],
                    'price' => $price,
                ]);
            }
        }

        return redirect()->action([OrderController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $this->authorize('view', $order);

        $order->user = User::find($order->user_id);
        $order->detail = OrderDetail::all()->where('order_id', $id);

        foreach ($order->detail as $order_detail) {
            $order_detail->package = Package::find($order_detail->package_id)->only('name', 'description', 'photo_path');
        }

        $order = json_encode($order, JSON_PRETTY_PRINT);
        return view('order.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order, Request $request, $id)
    {
        $this->authorize('update', $order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
