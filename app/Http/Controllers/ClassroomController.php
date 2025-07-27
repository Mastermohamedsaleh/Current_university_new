<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\College;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use App\Http\Requests\ClassroomRequest;



class ClassroomController extends Controller
{
  
    public function index()
    {
        $classrooms = Classroom::all();
        $colleges = College::all();
        return view('Admin.classrooms.index', compact('classrooms', 'colleges'));
    }


    public function create()
    {
        //
    }

    public function store(ClassroomRequest $request)
    {
    

        
        try {

            if($request->name != NULL){


                $name = $request->name;
                $college = $request->college_id;
    
                for($i =0 ; $i < count($name) ; $i++){
                      $insert = [
                        'name' => $name[$i],
                        'college_id'=>$college[$i]
                      ];
                     DB::table('classrooms')->insert($insert);
                }  
                return redirect()->route('classrooms.index');


        }else{
            return redirect()->back();
        }
                    
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

 

    }


    public function show($college_id)
    {
         
      $classrooms =  Classroom::where('college_id',$college_id)->get();
      $colleges = College::all();

         
      return view('Admin.classrooms.show', compact('classrooms','colleges'));

         
    }

    public function edit(Classroom $classroom)
    {
        //
    }


    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        
          
        try {

            $classroom = classroom::findOrFail($request->id);

            $classroom->update([

                $classroom->name = $request->name,
                $classroom->college_id = $request->college_id,
            ]);
            Session::flash('message', 'Udpate Success'); 
       
            return redirect()->back();
        }

        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
         
         
    }

  
    public function destroy(Classroom $classroom , Request $request)
    {
        $Classrooms = Classroom::findOrFail($request->id)->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->back();

    }
}
