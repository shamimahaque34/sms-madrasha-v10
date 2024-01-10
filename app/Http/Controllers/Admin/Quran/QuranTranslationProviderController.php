<?php

namespace App\Http\Controllers\Admin\Quran;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuranTranslationProviderFormRequest;
use App\Models\Backend\Quran\QuranTranslationProvider;
use Illuminate\Http\Request;

class QuranTranslationProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.quran.translationProvider.manage', [
        'transproviders' => QuranTranslationProvider::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quran.translationProvider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuranTranslationProviderFormRequest $request)
    {
        QuranTranslationProvider::saveOrUpdateTranslationProvider($request);
        return redirect()
            ->route('quran-translation-providers.index')
            ->with('success', 'Translation Provider Create successfully');
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
        return view('backend.quran.translationProvider.create', [
            'transprov' => QuranTranslationProvider::where('slug', $slug)->first(),
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
        QuranTranslationProvider::saveOrUpdateTranslationProvider($request, $id);
        return redirect()->route('quran-translation-providers.index')->with('success', 'Translation Provider Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $transprov = QuranTranslationProvider::where('slug', $slug)->first();
        $transprov->delete();
        return redirect()->route('quran-translation-providers.index')->with('success', 'Translation Provider Delete successfully');
    }
}
