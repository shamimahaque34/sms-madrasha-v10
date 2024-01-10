<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\EducationalStage;

class AcademicClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.academic.academic-class.manage', [
            'academicClasses' => AcademicClass::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.academic-class.create',[
            'educationalStages' => EducationalStage::all(),
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
       AcademicClass::saveData($request);
        return redirect()
            ->route('academic-classes.index')
            ->with('success', 'Academic Class Create Succesfully');
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
        return view('backend.academic.academic-class.create', [
            'educationalStages' => EducationalStage::all(),
            'academicClass' => AcademicClass::where('id', $id)->first(),
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
        AcademicClass::updateData($request, $id);
        return redirect()
            ->route('academic-classes.index')
            ->with('success', 'Academic Class Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academicClass = AcademicClass::where('id', $id)->first();
        $academicClass->delete();
        return redirect()
            ->route('academic-classes.index')
            ->with('success', 'Academic Class Delete Succesfully');
    }
}
