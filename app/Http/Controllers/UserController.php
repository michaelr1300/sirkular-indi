<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        $this->authorize('dashboard', Package::class);
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->is_admin = $request->is_admin;
        $user->save();
    }
}
