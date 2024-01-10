<?php

namespace App\Http\Controllers\Admin\ExamManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\Exam\ExamMarkDistributionType;
use Illuminate\Http\Request;

class ExamMarkDistributionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exammanagement.exam-mark-distribution-type.manage',[
            'exam_dist_type'=>ExamMarkDistributionType::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exammanagement.exam-mark-distribution-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ExamMarkDistributionType::saveData($request);
//        return redirect()->route('exam-mark-distribution-types.index')->with('success','Exam Mark Distribution Type create successfully');
        return back()->with('success','Exam Mark Distribution Type create successfully');
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
    public function edit($slug)
    {
        return view('backend.exammanagement.exam-mark-distribution-type.create',[
            'ExamMarkDistribution'=>ExamMarkDistributionType::where('slug',$slug)->first(),
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
        ExamMarkDistributionType::updateData($request,$id);
        return redirect()->route('exam-mark-distribution-types.index')->with('success','Exam Mark Distribution Type Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $markdist=ExamMarkDistributionType::where('slug',$slug)->first();
        $markdist->delete();
        return redirect()->route('exam-mark-distribution-types.index')->with('success','Exam Mark Distribution Type Deleted successfully');

    }
}
