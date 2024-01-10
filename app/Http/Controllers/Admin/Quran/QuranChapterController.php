<?php

namespace App\Http\Controllers\Admin\Quran;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuranChapterFormRequest;
use App\Models\Backend\Quran\QuranChapter;
use Illuminate\Http\Request;

class QuranChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.quran.chapter.manage',[
            'chapters' => QuranChapter::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quran.chapter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ QuranChapterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuranChapterFormRequest $request)
    {
        QuranChapter::saveData($request);
        return redirect()->route('quran-chapters.index')->with('success','Chapter Create Succesfully');
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
        return view('backend.quran.chapter.create',[
            'chapter'=>QuranChapter::where('slug',$slug)->first(),
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
        QuranChapter::updateData($request,$id);
        return redirect()->route('quran-chapters.index')->with('success','Chapter Update Succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $quranChapter = QuranChapter::where('slug',$slug)->first();
        $quranChapter->delete();
        return redirect()->route('quran-chapters.index')->with('success','Chapter Delete Succesfully');


    }
}
