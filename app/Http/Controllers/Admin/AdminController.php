<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   
    public function dashboard(){
        return view("admin.dashboard");
    }

    public function login(Request $request){

   

        if($request->isMethod('post')){

            $this->validate($request,  [
                'email' => "required|email",
                'password' => 'required'
            ]);

            if(auth()->guard('admin')->attempt($request->only('email' , 'password'))){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->back()->with('err_message' , 'Invalid Username or Password');
            }

        }


        return view("admin.login");
    }

    public function logout(){

        auth()->guard('admin')->logout();

        return redirect("admin/login");
    }

}
