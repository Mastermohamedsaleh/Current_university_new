<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Gender;
use App\Models\Nationalitie;
use App\Models\Classroom;
use App\Models\College;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentRequest;




class StudentController extends Controller
{
 
    public function index(Request $request)
    {
        if(auth()->user()->status == 0 ){
            $search = $request->input('search');          
            if ($search) {  
                $students = Student::where('name', 'like', "%$search%")->orwhere('email', 'like', "%$search%")->paginate(PAGENATOR_COUNT);
            }else{
                $students = Student::paginate(PAGENATOR_COUNT);  
            } 
        }else{
            $search = $request->input('search');          
            if ($search) {  
                $students = Student::where('college_id',auth()->user()->college_id)->where('name', 'like', "%$search%")->orwhere('email', 'like', "%$search%")->paginate(PAGENATOR_COUNT);
            }else{
                $students = Student::where('college_id',auth()->user()->college_id)->paginate(PAGENATOR_COUNT);  
            }
        }




        return view('Admin.students.index',compact('students'));
    }


    public function create()
    {
      $data['genders'] = Gender::all();
      $data['nationalities']  = Nationalitie::all();

      if(auth()->user()->status == 0 ){
        $data['colleges'] = College::all();
      }else{
        $data['colleges'] = College::where('id',auth()->user()->college_id)->get();
      }

    return view('Admin.students.add',$data);
    }


    public function store(StudentRequest $request)
    {
         
         
        try {
            $students = new Student();
            $students->name = $request->name;
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->ssn = $request->ssn;
            $students->nationalitie_id = $request->nationalitie_id;    
            $students->college_id = $request->college_id;
            $students->classroom_id = $request->classroom_id;
            $students->section_id = $request->section_id;
            $students->academic_year = $request->academic_year;
            $students->save();

          
           Session::flash('message', 'Add Success');
            return redirect()->route('students.index');

        }

        catch (\Exception $e){
    
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
     
    }


    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        
        if(auth()->user()->status == 0 ){
            $student = Student::where('id',$id )->first();
            $data['colleges'] = College::all();
         }else{
            $student = Student::where('id',$id )->where('college_id',auth()->user()->college_id)->first();
            $data['colleges'] = College::where('id',auth()->user()->college_id)->get();
        }
       
         if( !$student  ){
            return redirect()->back();
         }
         $data['genders'] = Gender::all();
         $data['nationalities']  = Nationalitie::all();
        return view('Admin.students.edit',compact('student') , $data);
    }


    public function update(StudentRequest $request, Student $student)
    {
        try {
            $students =  Student::findOrfail( $student->id);
            $students->name = $request->name;
            $students->email = $request->email;
            $students->password = $request->password;
            $students->gender_id = $request->gender_id;
            $students->ssn = $request->ssn;
            $students->nationalitie_id = $request->nationalitie_id;    
            $students->college_id = $request->college_id;
            $students->classroom_id = $request->classroom_id;
            $students->section_id = $request->section_id;
            $students->academic_year = $request->academic_year;
            $students->save();

          
           Session::flash('message', 'Update Success');
            return redirect()->route('students.index');

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request  , $id)
    {
        student::where('id', $id)->forceDelete();
        // $student = Student::findOrFail($id)->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->route('students.index');
    }
}
