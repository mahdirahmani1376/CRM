<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function reset(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = auth()->user();

        if (! Hash::check($data['old_password'], $user->password)) {
            return back()->with(['error' => 'Old password doesnt match']);
        }

        $user->update(['password' => $data['new_password']]);

        return back()->with(['status' => 'password has been changed successfully']);
    }
}
