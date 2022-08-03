<?php

namespace App\Http\Controllers\Admin\content;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function showSkills(Request $request){

        
           

            if($request->isMethod('post')){

                if($request->has('delete')){
                    

                    $delete_field = Skill::where('name' , $request->name);                   

                    $delete_field->delete();
                    
                    
                }

                if($request->has('save')){

                    $this->validate($request ,[
                        'name' => "required",
                        'val' => "max:100|min:0|numeric",
                    ]);


            
                    $update_field = Skill::where('name' , $request->name)->first();

                    $update_field->value = $request->val;

                    $update_field->save();
                    
                }

            }


            $all_skills = Skill::all();

            // dd($all_skills);





        return view('admin.content.skills.showSkills' , ['all_skills' => $all_skills]);

    }

    public function addSkills(Request $request){

        if($request->isMethod('post')){

            $this->validate($request ,[
                'name' => "required",
                'val' => "max:100|min:0|numeric",
            ]);

            $skill = new Skill();

             $skill-> name = $request->name;
             $skill-> value = $request->val;

             $skill->save();

             return redirect()-> route('showSkills');
        

        }

        return view('admin.content.skills.addSkills');
    }
}
