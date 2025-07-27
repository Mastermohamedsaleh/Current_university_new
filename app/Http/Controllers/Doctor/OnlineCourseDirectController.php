<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\OnlineCourse;

use App\Http\Traits\MeetingZoomTrait;
use Illuminate\Support\Facades\Session;

use Zoom;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


class OnlineCourseDirectController extends Controller
{
 
  
    public function index()
    {
        //  
    }


    public function create()
    {
        $courses = Course::where('doctor_id',auth()->user()->id)->get();
        return view('Doctor.onlinecourse.createtodirect',compact('courses'));
    }


    public function store(Request $request)
    {

        $validated = $this->validate($request, [
            'course' => 'required',
            'topic' => 'required',
            'start_time' => 'required',
            'duration' => 'required|numeric'
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' .self::generateToken(),
                'Content-Type' => 'application/json',
            ])->post("https://api.zoom.us/v2/users/me/meetings", [
                'topic' => $request->topic,
                'type' => 2, // 2 for scheduled meeting
                'start_time' => Carbon::parse($request->start_time)->toIso8601String(),
                'duration' => '60',
            ]);    

            // return $response->json();


            $course =   Course::where('id',$request->course)->first();

            OnlineCourse::create([
             'doctor_id'=>auth()->user()->id,
             'college_id'=>$course->college_id,
             'classroom_id'=>$course->classroom_id,
             'section_id'=>$course->section_id,
             'course_id'=>$request->course,
             'meeting_id'=>$response->json()['id'],
             'topic'=>$request->topic,
             'start_at'=>$request->start_time,
             'duration'=>'60',
             'password'=>$response->json()['password'],
             'start_url'=>$response->json()['start_url'],
             'join_url'=>$response->json()['join_url'],
            ]);
            Session::flash('message', 'Add Success');
            return redirect()->route('onlinecourse.index');

        } catch (\Throwable $th) {
            throw $th;
        }


    }




     protected function generateToken(): string
     {
         try {
             $base64String = base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET'));
             $accountId = env('ZOOM_ACCOUNT_ID');
 
             $responseToken = Http::withHeaders([
                 "Content-Type"=> "application/x-www-form-urlencoded",
                 "Authorization"=> "Basic {$base64String}"
             ])->post("https://zoom.us/oauth/token?grant_type=account_credentials&account_id={$accountId}");
 
             return $responseToken->json()['access_token'];
 
         } catch (\Throwable $th) {
             throw $th;
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

    public function destroy($id)
    {
        //
    }
}
