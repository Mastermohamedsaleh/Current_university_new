<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignmentRequest;
use App\Models\Course;
use App\Services\AssignmentService;

use Illuminate\Support\Facades\Session;

class AssignmentController extends Controller
{
    protected $assignmentService;

    public function __construct(AssignmentService $assignmentService)
    {
        $this->assignmentService = $assignmentService;
    }

    public function index()
    {
        $assignments = $this->assignmentService->getAllAssignmentsForDoctor(auth()->id());
        return view('Doctor.Assignments.index', compact('assignments'));
    }

    public function create()
    {
        $data['courses'] = Course::where('doctor_id', auth()->id())->get();
        return view('Doctor.Assignments.create', $data);
    }

    public function store(AssignmentRequest $request)
    {
        try {
            $this->assignmentService->createAssignment($request);
            Session::flash('message', 'Add Success');
            return redirect()->route('assignments.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $assignment = $this->assignmentService->getAssignmentFile($id);
        if ($assignment) {
            return view('Doctor.Assignments.show_pdf_doctor', compact('assignment'));
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $assignment = $this->assignmentService->getAssignmentForEdit($id);
        if ($assignment) {
            $courses = Course::where('doctor_id', auth()->id())->get();
            return view('Doctor.Assignments.edit', compact('courses', 'assignment'));
        } else {
            return redirect()->back();
        }
    }

    public function update(AssignmentRequest $request, $id)
    {
        try {
            $this->assignmentService->updateAssignment($request, $id);
            Session::flash('message', 'Update Success');
            return redirect()->route('assignments.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->assignmentService->deleteAssignment($id);
            Session::flash('message', 'Delete Success');
            return redirect()->route('assignments.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
