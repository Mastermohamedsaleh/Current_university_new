<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\College;
use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SectionRequest;



class SectionController extends Controller
{
  
    public function index()
    {

        $colleges = College::all();
        $classrooms = Classroom::all();
        $sections = Section::all();
        return view('Admin.sections.index',compact('colleges','classrooms','sections'));
    }

  
    public function create()
    {
        //
    }


    public function store(SectionRequest $request)
    {
         
        try {

       

            
            $Sections = new Section();
      
            $Sections->name = $request->name;
            $Sections->college_id = $request->college_id;
            $Sections->classroom_id = $request->classroom_id;
           
            $Sections->save();

            Session::flash('message', 'Add Success'); 
            return redirect()->back();
        }
      
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
         

    }

 
    public function show($id)
    {
        $sections =  Section::where('college_id',$id)->get();
        $classrooms =  Classroom::where('college_id',$id)->get();
        $colleges = College::all();
        return view("Admin.sections.show",compact('sections','classrooms','colleges'));
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(SectionRequest $request, Section $section)
    {
        



        try {
            
            $Sections = Section::findOrFail($section->id);
      
            $Sections->name = $request->name;
            $Sections->college_id = $request->college_id;
            $Sections->classroom_id = $request->classroom_id;
         
            $Sections->save();
            Session::flash('message', 'Update Success');       
            return redirect()->back();
        }
        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }




    }

 
    public function destroy(Request $request , $id)
    {
        

        $Sections = Section::findOrFail($request->id)->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->back();


    }



    public function getclasses($id){

        $list_classes = Classroom::where("college_id", $id)->pluck("name", "id");

        return $list_classes;

          
    }


    public function getsection($id){

        $list_sections = Section::where("college_id", $id)->pluck("name", "id");
        return  $list_sections;
    }

    // public function classesgraduated($id){
    //     $list_classes = Classroom::where("college_id", $id)->latest()->take(1)->pluck("name", "id");


        
    

    //     return $list_classes;
    // }


}
