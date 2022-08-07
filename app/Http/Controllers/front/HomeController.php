<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Portfolio_category;
use App\Models\Portfolio_entry;
use App\Models\Resume;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;

class HomeController extends Controller
{
    
    public function fetchData(){

        $heros = Hero::all()->first()->getAttributes();

        $skills = Skill::all();

        $portfolio_categories = Portfolio_category :: all();

        $portfolio_entries = Portfolio_entry::all();

        $services = Service::all();

        $testimonials = Testimonial::all();

        $abouts = About::all()->first()->getAttributes();

        $resumes = Resume::all()->first()->getAttributes();


        return view('front.home' , ['hero' => $heros , 
                    'skills' => $skills,
                    'portfolio_categories' => $portfolio_categories,
                    'portfolio_entries' => $portfolio_entries,
                    'services' => $services,
                    'testimonials' => $testimonials,
                    'about' => $abouts,
                    'resume' => $resumes] );

    }

}
