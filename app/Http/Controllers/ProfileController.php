<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'address' => 'required',
            'phone_number' => 'required',
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->save();
    }
}
