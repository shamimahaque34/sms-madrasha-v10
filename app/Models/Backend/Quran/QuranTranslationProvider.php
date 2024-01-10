<?php

namespace App\Models\Backend\Quran;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranTranslationProvider extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'brand_name',
        'translated_by',
        'language',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'quran_translation_providers';

    public static function saveOrUpdateTranslationProvider ($request, $id = null)
    {
        QuranTranslationProvider::updateOrCreate(['id' => $id], [
            'brand_name'    => $request->brand_name,
            'translated_by' => $request->translated_by,
            'language'  => $request->language,
            'slug'  => str_replace(' ', '-', $request->brand_name),
            'status'    => $request->status == 'on' ? 1 : 0,
        ]);
    }

//    public function quranTranslations()
//    {
//        return $this->hasMany(QuranTranslation::class);
//    }
}
