<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PromotionService;
use App\Models\College;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PromotionRequest;




class PromotionController extends Controller
{


    protected $promotionService;

    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }
 
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
    try{
            $this->promotionService->promoteStudents($request->all());
            Session::flash('message', 'Add Success');
            return redirect()->back();
        } catch (\Exception $e) {
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

     try {
            $this->promotionService->rollbackPromotion($request->all() ,$id);
            Session::flash('message', 'Return Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
