<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Gender;
use App\Models\College;
use App\Models\Section;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Hash;



class DoctorController extends Controller
{

    public function index()
    {

        if(auth()->user()->status == 0){
            $doctors = Doctor::all(); 
        }else{
            $doctors = Doctor::where('college_id',auth()->user()->college_id)->get();
        }
         
        return view('Admin.doctors.index',compact('doctors'));
    }


    public function create()
    {

        if(auth()->user()->status == 0){ 
            $data['colleges'] = College::all();
        }else{
            $data['colleges'] = College::where('id',auth()->user()->college_id)->get();
        }

        $data['genders'] = Gender::all();
        $data['sections'] = Section::all();
        $data['nationalities']  = Nationalitie::all();

        return view('Admin.doctors.add',$data);
    }


    public function store(DoctorRequest $request)
    {
        try{
          $doctor = new Doctor();
          $doctor->name = $request->name;
          $doctor->email = $request->email;
          $doctor->password =  Hash::make($request->password);
          $doctor->gender_id = $request->gender_id;
          $doctor->nationalitie_id = $request->nationalitie_id;
          $doctor->ssn = $request->ssn;
          $doctor->college_id =  $request->college_id;
          $doctor->Address = $request->address;
          $doctor->Joining_Date = $request->Joining_Date;
          $doctor->save();
          Session::flash('message', 'Add Success');
          return redirect()->route('doctors.index');

        }catch (\Exception $e){    
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {

       

     if(auth()->user()->status == 0){ 
        $data['colleges'] = College::all();
        $data['genders'] = Gender::all();
        $data['sections'] = Section::all();
        $data['nationalities']  = Nationalitie::all();
        $doctor = Doctor::findorfail($id);
     return view('Admin.doctors.edit', compact('doctor') ,$data);
    }else{

        $doctor = Doctor::where('id',$id )->where('college_id',auth()->user()->college_id)->first();
       
        if( !$doctor  ){
           return redirect()->back();
        }
        $data['colleges'] = College::where('id',auth()->user()->college_id)->get();
        $data['genders'] = Gender::all();
        $data['sections'] = Section::all();
        $data['nationalities']  = Nationalitie::all();

    return view('Admin.doctors.edit', compact('doctor') ,$data);


    }

         
    }

 
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        try{

            $doctor =  Doctor::findOrfail( $doctor->id);
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->gender_id = $request->gender_id;
            $doctor->nationalitie_id = $request->nationalitie_id;
            $doctor->ssn = $request->ssn;
            $doctor->Address = $request->address;
            $doctor->Joining_Date = $request->Joining_Date;
            $doctor->college_id = $request->college_id;
            $doctor->save();
            Session::flash('message', 'Update Success');
            return redirect()->route('doctors.index');
       

          }catch (\Exception $e){    
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }


    public function destroy(Request $request,$id)
    {
        $doctor = Doctor::findOrFail($request->id)->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->route('doctors.index');
    }
}
