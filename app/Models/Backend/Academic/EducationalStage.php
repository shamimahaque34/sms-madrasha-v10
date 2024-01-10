<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationalStage extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['group_name', 'slug', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'educational_stages';

    protected static $educationalStage;

    public static function updateData($request, $id)
    {
        self::$educationalStage = EducationalStage::find($id);
        self::insertData($request, self::$educationalStage);
    }

    public static function saveData($request)
    {
        self::$educationalStage = new EducationalStage();
        self::insertData($request);
    }

    public static function insertData($request, $educationalStage = null)
    {
        self::$educationalStage->group_name = $request->group_name;
        self::$educationalStage->status = $request->status == 'on' ? 1 : 0;
        self::$educationalStage->slug = str_replace(' ', '-', $request->group_name);
        self::$educationalStage->save();
    }

//    public function subjects()
//    {
//        return $this->hasMany(Subject::class);
//    }
//
//    public function academicClasses()
//    {
//        return $this->hasMany(AcademicClass::class);
//    }
}
