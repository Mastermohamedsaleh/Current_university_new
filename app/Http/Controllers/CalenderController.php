<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Event;

use Illuminate\Support\Facades\Auth;



class CalenderController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)->where('college_id',auth()->user()->college_id)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}

            return view('index');
        

    }


    public function student(Request $request){


        if($request->ajax())
    	{
    		$data = Event::where('college_id',Auth::guard('student')->user()->college_id)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}

        return view('dashboard_student.index');

      
    }


    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end,
                    'college_id'=> auth()->user()->college_id
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end,
                    'college_id'=> auth()->user()->college_id
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}

