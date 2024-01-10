<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Exam\Exam;
use App\Models\Backend\Exam\ExamSchedule;
use App\Models\Backend\Exam\ExamAttendance;
use App\Models\Backend\UserManagement\Student;
use Illuminate\Http\Request;

class ExamAttendanceController extends Controller
{
    public $examSchedules, $examSchedule, $examAttendances, $students;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exammanagement.examattendance.manage',[
            'exams' => Exam::where('status', 1)->get(),
            'sections' => Section::where('status', 1)->get(),
            'classes' => AcademicClass::where('status', 1)->get(),
            'attendance' => ExamAttendance::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exammanagement.examattendance.create',[
            'exams' => Exam::where('status', 1)->get(),
//            'schedules' => ExamSchedule::where('status', 1)->get(),
            'sections' => Section::where('status', 1)->get(),
            'classes' => AcademicClass::where('status', 1)->get(),
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
        ExamAttendance::saveExamAttendance($request);
        return redirect()->route('exam-attendance.index')->with('success','Exam Attendance create successfully');

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
        return view('backend.exammanagement.examattendance.create',[
            'exams' => Exam::where('status', 1)->get(),
            'schedules' => ExamSchedule::where('status', 1)->get(),
            'ExamAttendance' => ExamAttendance::find($id),
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
        ExamAttendance::updateData($request,$id);
        return redirect()->route('exam-attendance.index')->with('success','Exam Attendance Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = ExamAttendance::find($id);
        $attendance->delete();
        return redirect()->route('exam-attendance.index')->with('success','Exam Attendance Deleted successfully');

    }

    public function getExamScheduleBySectionClassExam (Request $request)
    {
        $this->examSchedules = ExamSchedule::where(['exam_id' => $request->exam_id, 'academic_class_id' => $request->class_id, 'section_id' => $request->section_id, ])->get();
        if ($this->examSchedules->isEmpty()) {
            return response()->json([
                'status' => 'empty',
                'message' => 'Sorry!! No Schedule found.'
            ]);

        } else {
            return response()->json([
                'status' => 'success',
                'schedules' => $this->examSchedules,
                'students' => Student::where(['academic_class_id' => $request->class_id, 'section_id' => $request->section_id])->get()
            ]);
        }
    }

    public function getStudentExamAttendance (Request $request)
    {
//        return response()->json($request);
        $this->examAttendances = ExamAttendance::where(['academic_class_id' => $request->class_id, 'section_id' => $request->section_id, 'exam_id' => $request->exam_id, 'exam_schedule_id' => $request->schedule_id])->with('student')->get();
        if ($this->examAttendances->isEmpty())
        {
            return response()->json([
                'status' => 'empty',
                'message' => 'Sorry!! No Students found.'
            ]);
        } else {
            return response()->json([
                'status' => 'success',
                'attendances' => $this->examAttendances
            ]);
        }
    }

    public function updateExamAttendance (Request $request)
    {
        ExamAttendance::updateAttendance($request);
        return back()->with('success', 'Updated');
    }
}
