<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\AcademicYear;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Academic\Subject;
use App\Models\Backend\Exam\Exam;
use App\Models\Backend\Exam\ExamSchedule;
use Illuminate\Http\Request;

class ExamScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exammanagement.examschedule.manage',[
            'schedul' => ExamSchedule::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exammanagement.examschedule.create',[
            'exams'             => Exam::where('status', 1)->get(),
            'sections'          => Section::where('status', 1)->get(),
            'subjects'          => Subject::where('status', 1)->get(),
            'academicClasses'   => AcademicClass::where('status', 1)->get(),
            'academicYears'     => AcademicYear::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ExamSchedule::saveData($request);
        return redirect()->route('exam-schedules.index')->with('success','Exam Schedule has created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.exammanagement.examschedule.create',[
            'exams'                     => Exam::where('status', 1)->get(),
            'sections'                  => Section::where('status', 1)->get(),
            'subjects'                  => Subject::where('status', 1)->get(),
            'academicClasses'           => AcademicClass::where('status', 1)->get(),
            'academicYears'             => AcademicYear::where('status', 1)->get(),
            'examShedule'               => ExamSchedule::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ExamSchedule::updateData($request,$id);
        return redirect()->route('exam-schedules.index')->with('success','Exam Schedule Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedul=ExamSchedule::find($id);
        $schedul->delete();
        return redirect()->route('exam-schedules.index')->with('success','Exam Schedule deleted successfully');

    }
}
