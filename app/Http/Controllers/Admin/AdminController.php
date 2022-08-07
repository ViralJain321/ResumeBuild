<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   
    public function dashboard(){
        return view("admin.dashboard");
    }


    public function profile(){
        return view('admin.settings.profile');
    }

    public function editProfile(Request $request){

       $adm = Admin::where(  'email' , auth()->guard('admin')->user()->email )->first();

       $adm->name = $request->name;

       $adm->save();

       return back()->with("status", "Profile updated successfully!");

    }

    public function updatePassword(Request $request){

        $this->validate($request ,[
            'curr_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->curr_password, auth()->guard('admin')->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        Admin::where('email', auth()->guard('admin')->user()->email ) ->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");

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
