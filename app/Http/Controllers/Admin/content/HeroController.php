<?php

namespace App\Http\Controllers\Admin\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{
    public function hero(Request $request){

        // dd($request->all());

        if($request->isMethod('post')){

            // dd($request->all());

            $this->validate($request,  [
                'name' => "required",
                'twitter_id' => 'url'
            ]);

            $hero = Hero::where('id', 1)->first();
 
            if ($hero === null) {
                $hero = new Hero(['name' => request('name') ]);
            }
             
            $hero->twitter_id = request('twitter_id');
            $hero->facebook_id = request('facebook_id');
            $hero->instagram_id = request('instagram_id');
            $hero->skype_id = request('skype_id');
            $hero->linkedIn_id = request('linkedIn_id');
             
            $hero->save();

            // if(auth()->guard('admin')->attempt($request->only('name'))){
                // return redirect()->route('admin.dashboard');
            // }else{
                return redirect()->back()->with('message' , 'Updated details successfully');
            // }
    }

        $hero = Hero::all()->first()->getAttributes();

         return view('admin.content.hero' , ['hero' => $hero]);
    }
}
