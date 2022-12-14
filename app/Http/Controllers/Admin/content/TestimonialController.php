<?php

namespace App\Http\Controllers\Admin\content;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
  
    public function insertTestimonial(Request $request){

        

        if($request->isMethod('post')){

             if($request->has('delete')){

                $delete_testimonial = Testimonial::where('id' , $request->id)->first();


                if(!is_null($delete_testimonial->image)){
                if(File::exists(public_path('/front/assets/img/testimonials/' . $delete_testimonial->image))){
                    File::delete('/front/assets/img/testimonials/' . $delete_testimonial->image);
                }
            }

                
                $delete_testimonial->delete();

             }else{


                $this->validate($request ,[
                    'name' => 'required',
                    'image' => 'sometimes|image',
                    'description' => 'required'
                ]);


                $originalFile = null;

                if($request->file('image')){
    
                    $file = $request->file('image');
                    $destinationPath = 'front/assets/img/testimonials/';
                    $originalFile = $file->getClientOriginalName();
                    $filename=strtotime(date('Y-m-d-H:isa')).$originalFile;
                    $file->move($destinationPath, $filename); 
                   }
    
                $new_testimonial = new Testimonial();

                $new_testimonial->name = $request->name;
                $new_testimonial->designation = $request->designation;
                $new_testimonial->image = $originalFile;
                $new_testimonial->description = $request->description;


                $new_testimonial->save();


             }

        }

        $all_testimonials = Testimonial::all();

        return view('admin.content.testimonials.testimonial' , ['all_testimonials' => $all_testimonials]);
    }
    
}
