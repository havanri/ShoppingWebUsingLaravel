<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function loginCustomer(){
        if(auth()->check()){
            return redirect()->to('/');
        }
        //Menu
        $menuParent = Menu::where('parent_id',0)->get();

        //Setting icon
        $settings  = Setting::all();
        return view('user.login',compact('menuParent','settings'));
    }
    public function postloginCustomer(Request $request){
        //check remember_me
        // $passwordSecret = bcrypt('12345678');
        // dd($passwordSecret);
        $remember = $request->has('remember_me') ? true : false;
        // dd(auth()->attempt([
        //     'email'=>$request->input('email'),
        //     'password'=>$request->input('password')
        // ],$remember));
        if(auth()->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ],$remember)){
            return redirect()->to('/');
        }
        else {
            dd('false');
        }
    }
    /**
    * Log the user out of the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function logout(Request $request)
    {
        auth()->logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
