<?php

namespace App\Http\Controllers\Admin\Quran;

use App\Http\Controllers\Controller;
use App\Models\Backend\Quran\QuranFont;
use Illuminate\Http\Request;

class QuranFontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.quran.quran-fonts.manage', [
            'quranFonts' => QuranFont::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quran.quran-fonts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        QuranFont::saveOrUpdateQuranFont($request);
        return redirect()->route('quran-fonts.index')->with('success', 'Quran Font  Create Succesfully');
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
        return view('backend.quran.quran-fonts.create', [
            'quranFont' => QuranFont::where('slug', $slug)->first(),
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
        QuranFont::saveOrUpdateQuranFont($request, $id);
        return redirect()->route('quran-fonts.index')->with('success', 'Quran Font Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $quranFont = QuranFont::where('slug', $slug)->first();
        $quranFont->delete();
        return redirect()->route('quran-fonts.index')->with('success', 'Quran Font Delete Succesfully');
    }
}
