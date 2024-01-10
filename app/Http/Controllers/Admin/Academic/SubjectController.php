<?php

namespace App\Http\Controllers\Admin\Academic;

use App\Http\Controllers\Controller;
use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\StudentGroup;
use App\Models\Backend\Academic\EducationalStage;
use App\Models\Backend\Academic\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.academic.subject.manage',[
            'subjects'=>Subject::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.subject.create',[
            'academicClasses'=>AcademicClass::where('status', 1)->get(),
            'studentGroups'=>StudentGroup::where('status', 1)->get(),
            'educationalStages'=>EducationalStage::where('status', 1)->get(),
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
//        return $request;
        Subject::saveOrUpdateSubject($request);
        return redirect()->route('subjects.index')->with('success','Subject Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('backend.academic.subject.details',[
            'subject'=>Subject::where('slug',$slug)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('backend.academic.subject.create',[
            'academicClasses' => AcademicClass::where('status', 1)->get(),
            'studentGroups' => StudentGroup::where('status', 1)->get(),
            'educationalStages' => EducationalStage::where('status', 1)->get(),
            'subject' => Subject::where('slug',$slug)->first(),
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
        Subject::saveOrUpdateSubject($request,$id);
        return redirect()->route('subjects.index')->with('success','Subject Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $subject = Subject::where('slug',$slug)->first();
        if ($subject)
        {
            if (file_exists($subject->subject_book_image)){
                unlink($subject->subject_book_image);
            }
            $subject->delete();
        }
        return redirect()->route('subjects.index')->with('success','Subject Create successfully');
    }
}
