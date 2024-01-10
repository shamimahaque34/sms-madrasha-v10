<?php

namespace App\Models\Backend\Quran;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranVerse extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quran_chapter_id',
        'quran_font_id',
        'verse_arabic',
        'verse_bangla',
        'verse_english',
        'audio',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'quran_verses';

    public static function saveOrUpdateQuranVerse ($request, $id = null)
    {
        QuranVerse::updateOrCreate(['id' => $id], [
            'quran_chapter_id'  => $request->quran_chapter_id,
            'quran_font_id' => $request->quran_font_id,
            'verse_arabic'  => $request->verse_arabic,
            'verse_bangla'  => $request->verse_bangla,
            'verse_english' => $request->verse_english,
            'audio' => fileUpload($request->file('audio'),'quran-verse-audio', 'sura-'.$request->quran_chapter_id),
            'slug'  => str_replace(' ', '-', $request->verse_arabic),
            'status'    => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function quranChapter()
    {
        return $this->belongsTo(QuranChapter::class);
    }

    public function quranTranslations()
    {
        return $this->hasMany(QuranTranslation::class);
    }

    public function quranFont()
    {
        return $this->belongsTo(QuranFont::class);
    }
}
