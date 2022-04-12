<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
}
