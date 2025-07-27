<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FeeRequest;

use App\Models\College;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Fee_invoice;
use App\Models\StudentAccount;

use Illuminate\Support\Facades\DB;


class FeeController extends Controller
{

    public function index()
    {
        $fee = Fee::all();
        return view('Admin.fee.index',compact('fee'));
    }

 
    public function create()
    {
        $colleges = College::all();
        return view('Admin.fee.add',compact('colleges'));
        
    }





    public function show(){
        //
    }


    public function edit($id)
    {
         $fee = Fee::findOrfail($id); 
         $colleges = College::all();
         return  view('Admin.fee.edit',compact('fee','colleges'));      
    }



    public function store(FeeRequest $request)
    {

        DB::beginTransaction();
         
        try{
            $fee = new Fee();
            $fee->amount = $request->amount;
            $fee->title = $request->title;
            $fee->college_id = $request->college_id;
            $fee->classroom_id = $request->classroom_id;
            $fee->section_id = $request->section_id;
            $fee->academic_year = $request->academic_year;
            $fee->save();

   if($request->section_id){
         $students = Student::where('college_id',$request->college_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->get();       
    }else{
         $students = Student::where('college_id',$request->college_id)->where('classroom_id',$request->classroom_id)->get();
    }

    if($students->count() < 1){
        return redirect()->back()->with('error','No Students');
    }



    foreach($students as $student){  
        $fee_invoice = new Fee_invoice();
        $fee_invoice->invoice_date = date('Y-m-d');
        $fee_invoice->student_id = $student->id;
        $fee_invoice->college_id = $request->college_id;
        $fee_invoice->classroom_id = $request->classroom_id;
        $fee_invoice->section_id = $request->section_id;
        $fee_invoice->fee_id = $fee->id;
        $fee_invoice->amount = $request->amount;
        $fee_invoice->academic_year = $request->academic_year;
        $fee_invoice->save();  
        
        
       $StudentAccount = new StudentAccount();
       $StudentAccount->date = date('Y-m-d');
       $StudentAccount->fee_invoice_id = $fee_invoice->id;
       $StudentAccount->student_id = $student->id;
       $StudentAccount->Debit = $request->amount;
       $StudentAccount->academic_year = $request->academic_year;
       $StudentAccount->credit = 0.00;
       $StudentAccount->save();
    }

        DB::commit();
        Session::flash('message', 'Add Success');
        return redirect()->route('fee.index');
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
          
         
    }

    



    public function update(FeeRequest $request, $id)
    {

        // DB::beginTransaction();

        // try{
        //     $fee =  Fee::findOrfail($id);
        //     $fee->amount = $request->amount;
        //     $fee->title = $request->title;
        //     $fee->college_id = $request->college_id;
        //     $fee->classroom_id = $request->classroom_id;
        //     $fee->section_id = $request->section_id;
        //     $fee->academic_year = $request->academic_year;
        //     $fee->save();


        //  if($request->section_id){
        //       $students = Student::where('college_id',$request->college_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->get();       
        //    }else{
        //       $students = Student::where('college_id',$request->college_id)->where('classroom_id',$request->classroom_id)->where('academic_year',$request->academic_year)->get();
        //    }
        //    foreach($students as $student){ 
        //    Fee_invoice::whereIn('student_id', $students->id)
        //    ->update([
        //     'invoice_date'=> date('Y-m-d'),
        //     'student_id'=>$student->id,
        //     'college_id'=>$student->college_id,
        //     'classroom_id'=>$student->classroom_id,
        //     'section_id'=> $student->section_id,
        //     'fee_id'=>$fee->id,
        //     'amount'=>$request->amount, // Add as many as you need
        //    ]);
        // }

    // return $students;

    // foreach($students as $student){
    //     $fee_invoice = Fee_invoice::where('fee_id',$id)->update([
    //                 'invoice_date'=> date('Y-m-d'),
    //                 'student_id'=>$student->id,
    //                 'college_id'=>$student->college_id,
    //                 'classroom_id'=>$student->classroom_id,
    //                 'section_id'=> $student->section_id,
    //                 'fee_id'=>$fee->id,
    //                 'amount'=>$request->amount,
    //                ]);
    // }
           
        //    if($students->count() < 1){
        //        return redirect()->back()->with('error','No Students');
        //    }
       
        //    foreach($students as $student){  
  
        //        $fee_invoice = Fee_invoice::where('fee_id',$id)->update([
        //         'invoice_date'=> date('Y-m-d'),
        //         'student_id'=>$student->id,
        //         'college_id'=>$student->college_id,
        //         'classroom_id'=>$student->classroom_id,
        //         'section_id'=> $student->section_id,
        //         'fee_id'=>$fee->id,
        //         'amount'=>$request->amount,
        //        ]);


            


      
   
        //    $StudentAccount = StudentAccount::where('student',$student->id)->update([
        //     'date'=>date('Y-m-d'),
        //      'fee_invoice_id'=>$fee_invoice->id,
        //      'student_id'=>$student->id,
        //      'Debit'=>$request->amount,
        //      'credit'=> 0.00
        //    ]);

        
       
        //    }
   
        //    DB::commit();

        // Session::flash('message', 'update Success');
        // return redirect()->route('fee.index');
        // }catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }



    }


    public function destroy(Request $request,$id)
    {
        $fee = Fee::findOrFail($id)->delete();
        Session::flash('message', 'Delete Success');
        return redirect()->route('fee.index');
    }
}
