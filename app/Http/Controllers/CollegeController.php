<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\College;
use App\Http\Requests\CollegeRequest;
         
use Illuminate\Support\Facades\Session;



class CollegeController extends Controller
{
  
    public function index()
    {
         $colleges = College::all();
         return view('Admin.colleges.index',compact('colleges'));
    }

  
    public function create()
    {
        //
    }

 
    public function store(CollegeRequest $request)
    {
           

        try{

            $college = new College();
            $college->name = $request->name;
            $college->note = $request->note;
            $college->save();

            Session::flash('message', 'Add Success');  
            return redirect()->route('colleges.index');
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
 
             



    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
    //
    }

    public function update(CollegeRequest $request, College $college)
    {
        try{

            $college = College::findOrFail( $college->id);
            $college->name = $request->name;        
            $college->note = $request->note;        
            $college->save();
            
            Session::flash('message', 'Udpate Success');  
            return redirect()->route('colleges.index');

        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        College ::destroy($id);
        session()->flash('delete');
        return redirect()->back();

   
    }
}

