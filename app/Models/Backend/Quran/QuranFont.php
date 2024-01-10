<?php

namespace App\Models\Backend\Quran;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranFont extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['quran_font', 'slug', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'quran_fonts';

    protected $quranFornt;

    public static function saveOrUpdateQuranFont ($request, $id = null)
    {
        QuranFont::updateOrCreate(['id' => $id], [
            'quran_font'    => $request->quran_font,
            'slug'          => str_replace(' ', '-', $request->quran_font),
            'status'        => $request->status == 'on' ? 1 : 0,
        ]);
    }

//    public function quranVerses()
//    {
//        return $this->hasMany(QuranVerse::class);
//    }
}
