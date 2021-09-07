<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if (auth()->user()){
            return redirect()->route('admin.dashboard');
        }
    return view('admin.login_form');
   }
    public function login(Request $request){
       if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
           return redirect()->route('admin.dashboard');
       }
       session()->flash('warning', 'Email & Password Missmase!!');
        return redirect()->back()->withInput($request->all());
    }
    public function logout(){
        Auth::logout();
        session()->flash('success', 'LogOut Successfully!!');
        return redirect()->route('user.login');
    }
    public function admin(){
        return view('admin.login_form');
    }
}
