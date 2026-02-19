<?php

namespace App\Listeners;

use App\Events\AssignmentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewAssignmentAdded;
use App\Models\Student;


class SendAssignmentNotification 
{
  

     use InteractsWithQueue;

    public function __construct()
    {
        //
    }


    public function handle(AssignmentCreated $event)
    {
        $assignment = $event->assignment;
        $classroom = $assignment->classroom_id;
        $college   = $assignment->college_id;
        $students = Student::where('college_id', $college)
            ->where('classroom_id', $classroom)
            ->get();
        foreach ($students as $student) {
            $student->notify(new NewAssignmentAdded($assignment));
        }
    }
}


