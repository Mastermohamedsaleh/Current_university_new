<?php

namespace App\Http\Controllers\Accountant;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\Fee;
use App\Models\Fee_invoice;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class FeeInvoicesController extends Controller
{

    public function index()
    {
        $data = date("Y");
        $new_data = date("Y") + 1;
        $fee_invoices = Fee_invoice::where('college_id',auth()->user()->college_id)->where('academic_year',$data)->orwhere('academic_year',$new_data)->paginate(PAGENATOR_COUNT);
        return view('Accountant.fee_invoices.index',compact('fee_invoices'));
    }

  
    public function create($id)
    {
        //
    }

 
    public function store(Request $request)
    {
            
        DB::beginTransaction();
         
        try{
            $fee_invoice = new Fee_invoice();
            $fee_invoice->invoice_date = date('Y-m-d');
            $fee_invoice->student_id = $request->student_id;
            $fee_invoice->college_id = $request->college_id;
            $fee_invoice->classroom_id = $request->classroom_id;
            $fee_invoice->section_id = $request->section_id;
            $fee_invoice->fee_id = $request->fee_id;
            $fee_invoice->amount = $request->amount;
            $fee_invoice->save();


             // حفظ البيانات في جدول حسابات الطلاب 
             $StudentAccount = new StudentAccount();
             $StudentAccount->date = date('Y-m-d');
             $StudentAccount->fee_invoice_id =  $fee_invoice->id;
             $StudentAccount->student_id = $request->student_id;
             $StudentAccount->Debit = $request->amount;
             $StudentAccount->credit = 0.00;
             $StudentAccount->save();

        

             DB::commit();

             Session::flash('message', 'Add Success');
             return redirect()->route('fee_invoices.index');

        }catch(\Exception $e){

            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        }
         
          

    }


    public function show($id)
    {
        $student = Student::findorfail($id);
        $data = date("Y");
        $student_fee = Fee_Invoice::where('student_id',$id)->first();
        $fees = Fee::where('college_id',$student->college_id)->where('classroom_id',$student->classroom_id)->where('section_id',$student->section_id)->where('academic_year',$data)->get();
        return view('Accountant.fee_invoices.add',compact('student','fees','student_fee'));   
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
