<?php

namespace App\Http\Controllers\Admin\content;

use App\Http\Controllers\Controller;
use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    
    public function about(Request $request){

        $about_details = About::where('id', 1)->first();

        if($request->isMethod('post')){


            $this->validate($request ,[
                'tagline' => 'nullable|sometimes|max:80',
                'curr_designation' => 'required',
                'dob' => 'nullable|date',
                'email' => 'nullable|email',
                
            ]);

            
 
            if ($about_details === null) {
                $about_details = new About(['curr_designation' => request('curr_designationz') ]);
            }

            
            if(($request->profile_image) == null){
                if(File::exists(public_path('/front/assets/img/' . $about_details->image))){
                    File::delete('/front/assets/img/' . $about_details->image);
                }
            }
            


         
            
            $originalFile = null;

            if($request->file('profile_image')){

                $file = $request->file('profile_image');
                $destinationPath = 'front/assets/img/';
                $originalFile = $file->getClientOriginalName();
                $filename=strtotime(date('Y-m-d-H:isa')).$originalFile;
                $file->move($destinationPath, $filename); 
               }


            $about_details->tagline = $request->tagline;
            $about_details->curr_designation = $request->curr_designation;
            $about_details->image = $originalFile;
            $about_details->dob =   $request->dob; 
            $about_details->contact_no = $request->contact_no;
            $about_details->degree = $request->degree;
            $about_details->email = $request->email;
            $about_details->city = $request->city;
            $about_details->about_yourself = $request->city;
            $about_details->city = $request->city;
            
            if($request->freelance){
                $about_details->freelance = $request->freelance;
            }else{
                $about_details->freelance = "not available";
            }

            $about_details->about_yourself = $request->about_yourself;


            $about_details->save();


        }



        return view('admin.content.about.about' ,['about_details' => $about_details]);
    }
}
