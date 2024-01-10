<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\AcademicYear;
use App\Models\Backend\Academic\ClassSchedule;
use App\Models\Backend\Academic\Routine;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Academic\Subject;
use App\Models\Backend\UserManagement\Teacher;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.academic.routine.manage', [
            'routines' => Routine::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.routine.create',[
            'academicClasses'=> AcademicClass::where('status', 1)->get(),
            'subjects'       => Subject::where('status', 1)->get(),
            'sections'       => Section::where('status', 1)->get(),
            'teachers'       => Teacher::where('status', 1)->get(),
            'academicYears'  => AcademicYear::where('status', 1)->get(),
            'classSchedules' => ClassSchedule::where('status', 1)->get(),
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
        Routine::saveData($request);
        return redirect()->route('routines.index')->with('success', 'Assignment Create Succesfully');
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
        return view('backend.academic.routine.create',[
            'academicClasses'=> AcademicClass::where('status', 1)->get(),
            'subjects'       => Subject::where('status', 1)->get(),
            'sections'       => Section::where('status', 1)->get(),
            'teachers'       => Teacher::where('status', 1)->get(),
            'academicYears'  => AcademicYear::where('status', 1)->get(),
            'classSchedules' => ClassSchedule::where('status', 1)->get(),
            'routine'        => Routine::find($id)
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
        Routine::updateData($request, $id);
        return redirect() ->route('routines.index')->with('success', 'Routine Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routine =  Routine::find($id);
        $routine->delete();
        return redirect()->route('routines.index')->with('success', 'Routine Delete Successfully');
    }
}
