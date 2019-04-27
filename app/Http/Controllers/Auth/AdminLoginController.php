<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest:admin', ['except'=>['logout']]);
    }

    public function showLoginForm(){

        return view('auth.admin-login');
    }

    public function login(Request $request){
        //return true;
        //validate the foem data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attempt log user in
        if( Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
           //if successful, then redirect to the intende location
           return redirect()->intended(route('admin.dashboard'));
        } 
        //if unsuccessful, then redirect back to the login with the form of data
        return redirect()->back()->withInput($request->only('email', 'remember'));       
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        // $request->session()->invalidate();

        return redirect('/');
    }
}
