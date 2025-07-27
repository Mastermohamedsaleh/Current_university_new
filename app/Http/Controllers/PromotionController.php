<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\College;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PromotionRequest;



class PromotionController extends Controller
{
 
    public function index()
    {


        if(auth()->user()->status == 0 ){ 
            $promotions = Promotion::all();
         }else{
            $promotions = Promotion::where('from_college',auth()->user()->college_id)->get();
        }

        return view('Admin.promotion.mangment',compact('promotions'));

    
    }

   
    public function create()
    {

        if(auth()->user()->status == 0 ){  
            $colleges =  College::all();
        }else{
            $colleges =  College::where('id',auth()->user()->college_id)->get();
        }
        return view('Admin.promotion.create' , compact('colleges'));
    }


    public function store(PromotionRequest $request)
    {
        
        DB::beginTransaction();
        try{
         if($request->section_id){
           $students = student::where('college_id',$request->college_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();       
         }else{
            $students = student::where('college_id',$request->college_id)->where('classroom_id',$request->classroom_id)->where('academic_year',$request->academic_year)->get();
         }

      foreach($students as $student){  
        $ids = explode(',',$student->id);     
        Student::whereIn('id', $ids)
                    ->update([
                        'college_id'=>$request->college_id_new,
                        'classroom_id'=>$request->classroom_id_new,
                        'section_id'=>$request->section_id_new,
                        'academic_year'=>$request->academic_year_new,
                    ]);
        // insert in to promotions
       Promotion::updateOrCreate([
        'student_id'=>$student->id,
        'from_college'=>$request->college_id,
        'from_classroom'=>$request->classroom_id,
        'from_section'=>$request->section_id,
        'to_college'=>$request->college_id_new,
        'to_classroom_id'=>$request->classroom_id_new,
        'to_section_id'=>$request->section_id_new,
        'academic_year'=>$request->academic_year,
        'academic_year_new'=>$request->academic_year_new,
   ]);

      }

      DB::commit();
      Session::flash('message', 'Add Success');
      return redirect()->back();
    }catch (\Exception $e) {
         DB::rollback();
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


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy(Request $request , $id)
    {
        DB::beginTransaction();

        try {

            // التراجع عن الكل
            if($request->page_id ==1){
                if(auth()->user()->status == 0 ){ 
                    $Promotions = Promotion::all();  
                }else{
                    $Promotions = Promotion::where('to_college',auth()->user()->college_id)->get();
                }
             foreach($Promotions as $Promotion){

                 //التحديث في جدول الطلاب
                 $ids = explode(',',$Promotion->student_id);
                 Student::whereIn('id', $ids)
                 ->update([
                 'college_id'=>$Promotion->from_college,
                 'classroom_id'=>$Promotion->from_classroom,
                 'section_id'=> $Promotion->from_section,
                 'academic_year'=>$Promotion->academic_year,
               ]);

                 //حذف جدول الترقيات
                 Promotion::truncate();

             }
                DB::commit();
               Session::flash('message', 'Return Success');  
                return redirect()->back();


            }else{

                $Promotion = Promotion::findorfail($id);
                Student::where('id', $Promotion->student_id)
                    ->update([
                        'college_id'=>$Promotion->from_college,
                        'classroom_id'=>$Promotion->from_classroom,
                        'section_id'=> $Promotion->from_section,
                        'academic_year'=>$Promotion->academic_year,
                    ]);


                    $Promotion->delete();
           
                DB::commit();
                Session::flash('message', 'Return Success');
                return redirect()->back();
              
            }

        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
