<?php

namespace App\Http\Controllers\Admin\Quran;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuranTranslateFormRequest;
use App\Models\Backend\Quran\QuranChapter;
use App\Models\Backend\Quran\QuranTranslation;
use App\Models\Backend\Quran\QuranTranslationProvider;
use App\Models\Backend\Quran\QuranVerse;
use Illuminate\Http\Request;

class QuranTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $httpClient=new Client();
//        $apiUrl='https://api.quran.com/api/v4/quran/verses/indopak';
//        $response=$httpClient->request('GET',$apiUrl);
//        $content=$response->getBody();
//        return $content;

//        $client = new Client();
//        $apiUrl = 'https://api.quran.com/api/v4/quran/verses/indopak';
//        $apiContent = $client->request('GET', $apiUrl);
//        $jsonContent = $apiContent->getBody();
//        $content = json_decode($jsonContent);
//        $parentArray = [];
//        foreach ($content->verses as $vers)
//        {
//            $tempArray = [];
//            $explodeVerseKey = explode(':', $vers->verse_key);
//            if ($explodeVerseKey[0] == 12)
//            {
//                $tempArray = [
//                    'chapter_number'    => $explodeVerseKey[0],
//                    'verse_number'    => $explodeVerseKey[1],
//                    'verse'             => $vers->text_indopak,
//                ];
//                array_push($parentArray, $tempArray);
//            }
//        }
//        return $parentArray;



        return view('backend.quran.translation.manage',[
            'translations' => QuranTranslation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quran.translation.create',[
            'chapters' => QuranChapter::where('status', 1)->get(),
            'verses' => QuranVerse::where('status', 1)->get(),
            'transproviders' => QuranTranslationProvider::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuranTranslateFormRequest $request)
    {
        $translation = QuranTranslation::saveOrUpdateTranslate($request);
        return redirect()->route('quran-translations.index')->with('success','Translation Create successfully');
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
        return view('backend.quran.translation.create',[
            'chapters'  => QuranChapter::where('status', 1)->get(),
            'verses'    => QuranVerse::where('status', 1)->get(),
            'transproviders'    => QuranTranslationProvider::where('status', 1)->get(),
            'translation'   => QuranTranslation::where('slug',$slug)->first(),
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
        QuranTranslation::saveOrUpdateTranslate($request,$id);
        return redirect()->route('quran-translations.index')->with('success','Translation Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $translation=QuranTranslation::where('slug',$slug)->first();
        $translation->delete();
        return redirect()->route('quran-translations.index')->with('success','Translation Delete successfully');
    }

    public function getVerse (Request $request)
    {
        $quranVerses = QuranVerse::where('quran_chapter_id', $request->quran_chapter_id)->get();
        return json_encode($quranVerses);
    }
}
