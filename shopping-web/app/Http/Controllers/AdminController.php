<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    // public function test(){
    //     $categories = Category::latest()->paginate(5);
    //     return view('admin.category.test_table')->with('categories',$categories);
    // }
    public function loginAdmin(){
        
        if(auth()->check()){
            return redirect()->to('home');
        }
        return view('login');
    }
    public function postloginAdmin(Request $request){
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
            return redirect()->to('home');
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
 
        return redirect('/admin');
    }
}
