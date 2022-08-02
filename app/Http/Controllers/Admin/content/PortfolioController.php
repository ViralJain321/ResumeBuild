<?php

namespace App\Http\Controllers\Admin\content;

use App\Http\Controllers\Controller;
use App\Models\PortFolio_category;
use App\Models\Portfolio_entry;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    
    public function addCategory(Request $request){

        if($request->isMethod('post')){

            $category_name = strtolower($request->name);

           
            $this->validate($request , [
                'name' => "required|unique:portfolio_categories"
            ]);

            $category = new PortFolio_category;
            $category->name = $category_name;
            $category->save();
            
            // dd($request->all());




        }


        return view('admin.content.portfolio.addCategory');
    }

    public function insertEntry(Request $request){

        
        $all_categories = PortFolio_category::all();

        if($request->isMethod('post')){

            $this->validate( $request ,[
                'image' => 'required|image',
                'category' => "required"
               ]);

               if($request->file('image')){

                $file = $request->file('image');
                $destinationPath = 'front/assets/img/';
                $originalFile = $file->getClientOriginalName();
                $filename=strtotime(date('Y-m-d-H:isa')).$originalFile;
                $file->move($destinationPath, $filename); 
               }

            //    dd($request->all());
            // dd($originalFile);

            $new_entry = new Portfolio_entry();



            $new_entry-> name = $request->name;
            $new_entry-> category = $request->category;
            $new_entry-> img = $originalFile;

            $new_entry->save();

            return redirect()->back()->with('message' , 'Entry Added Successfully');


        }


     

        return view('admin.content.portfolio.insertEntry' ,[ 'all_categories' => $all_categories]);
    }
    
}
