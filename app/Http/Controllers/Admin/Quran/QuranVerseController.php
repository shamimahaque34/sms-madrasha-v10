<?php

namespace App\Http\Controllers\Admin\Quran;

use App\Http\Controllers\Controller;
use App\Models\Backend\Quran\QuranChapter;
use App\Models\Backend\Quran\QuranFont;
use App\Models\Backend\Quran\QuranVerse;
use Illuminate\Http\Request;

class QuranVerseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.quran.verse.manage', [
            'verses' => QuranVerse::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quran.verse.create', [
            'chapters' => QuranChapter::where('status', 1)->get(),
            'quranFonts' => QuranFont::where('status', 1)->get(),
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
        QuranVerse::saveOrUpdateQuranVerse($request);
        return redirect()->route('quran-verses.index') ->with('success', 'varse Create successfully');
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
        return view('backend.quran.verse.create', [
            'chapters' => QuranChapter::where('status', 1)->get(),
            'quranFonts' => QuranFont::where('status', 1)->get(),
            'verse' => QuranVerse::where('slug', $slug)->first(),
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
        QuranVerse::saveOrUpdateQuranVerse($request, $id);
        return redirect()->route('quran-verses.index')->with('success', 'varse Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $varse = QuranVerse::where('slug', $slug)->first();
        if (file_exists($varse->audio)) {
            unlink($varse->audio);
        }
        $varse->delete();
        return redirect()
            ->route('quran-verses.index')
            ->with('success', 'varse delete successfully');
    }
}
