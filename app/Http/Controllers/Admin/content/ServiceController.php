<?php

namespace App\Http\Controllers\Admin\content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
 
    public function insertService(Request $request){


        

        if($request->isMethod('post')){

         

            if($request->has('delete')){

              
                $delete_service = Service::where('title' , $request->title);

                $delete_service->delete();

            }else{

          
            $this->validate($request ,[
                 "title" => "required|unique:services",
                 "logo" => 'sometimes|image',
                 "description" => 'required'   
            ]);

            $originalFile = "";

            if($request->file('logo')){

                $file = $request->file('logo');
                $destinationPath = 'front/assets/img/logos/';
                $originalFile = $file->getClientOriginalName();
                $filename=strtotime(date('Y-m-d-H:isa')).$originalFile;
                $file->move($destinationPath, $filename); 
               }

            $insert_service = new Service();

            $insert_service->title = $request->title;
            $insert_service->logo = $originalFile;
            $insert_service->description = $request->description;

            $insert_service->save();
            
            }

        }

        $all_services = Service::all();

        return view('admin.content.services.services' , ['all_services' => $all_services]);
    }
    
}
