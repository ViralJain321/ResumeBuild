<?php

namespace App\Http\Controllers\Admin\content;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    
    public function resume(Request $request){

        $resume_details = Resume::where('id', 1)->first();


        if($request->isMethod('post')){

           
            $this->validate($request ,[
                'name' => 'required',
                'edu_course_name' => 'required',
                'work_role' => 'required',
                'edu_st_year' => ['regex:/^[0-9]+$/ ','min:4' ,'max:4'] 
                
            ]);



            if($resume_details === null){
                $resume_details = new Resume(['name' => request('name')]);

            }

            
            $resume_details->name = $request->name;
            $resume_details->summary_description = $request->summ_description;

            $resume_details->education_course_name = $request->edu_course_name;
            $resume_details->education_st_year = $request->edu_st_year;
            $resume_details->education_end_year = $request->edu_end_year;
            $resume_details->education_institute_name = $request->edu_institute_name;
            $resume_details->education_description = $request->edu_description;


            
            $resume_details->work_role = $request->work_role;
            $resume_details->work_place = $request->work_place;
            $resume_details->work_st_year = $request->work_st_year;
            $resume_details->work_end_year = $request->work_end_year;
            $resume_details->work_description = $request->work_description;



            $resume_details->save();

            

        }

   
        return view('admin.content.resume.resume' , ['resume_details' => $resume_details]);
    }
}
