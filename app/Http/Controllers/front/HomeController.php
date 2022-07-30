<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;

class HomeController extends Controller
{
    
    public function fetchHeroData(){

      

        $heros = Hero::all()->first()->getAttributes();

        // $heros = json_encode($heros);


        // dd($h);
        // dd($heros);

        return view('front.home' , ['hero' => $heros ] );

    }

}
