<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Authentication extends Controller
{
    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => "required",
            'password' => "required"
        ]);
        if ($validate) {
            $User = User::where('username', $request->username)->first();
            if ($User) {
                if ($User->password == $request->password) {
                    $request->session()->put('user', $User);
                    return redirect()->route('dashboard');
                } else {
                    $notification = [
                        "type" => "danger",
                        "msg" => "Wrong Credentials"
                    ];
                    session()->flash('notification', $notification);
                    return redirect()->back();
                }
            } else {
                $notification = [
                    "type" => "danger",
                    "msg" => "Wrong Credentials"
                ];
                session()->flash('notification', $notification);
                return redirect()->back();
            }
        }
    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
