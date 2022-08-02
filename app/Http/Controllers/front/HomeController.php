<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Portfolio_category;
use App\Models\Portfolio_entry;
use App\Models\Skill;

class HomeController extends Controller
{
    
    public function fetchData(){

      

        $heros = Hero::all()->first()->getAttributes();

        $skills = Skill::all();

        $portfolio_categories = Portfolio_category :: all();

        $portfolio_entries = Portfolio_entry::all();

        // dd($skills->count());

        // dd(dd($skills[1]['name']));

        // $heros = json_encode($heros);


        // dd($h);
        // dd($heros);

        return view('front.home' , ['hero' => $heros , 
                    'skills' => $skills,
                    'portfolio_categories' => $portfolio_categories,
                    'portfolio_entries' => $portfolio_entries] );

    }

}
