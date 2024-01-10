<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'section_name',
        'capacity',
        'slug',
        'note',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected static $section;

    public static function updateData($request, $id)
    {
        self::$section = Section::find($id);
        self::insertData($request, self::$section);
    }

    public static function saveData($request)
    {
        self::$section = new Section();
        self::insertData($request);
    }

    public static function insertData($request, $section = null)
    {
        self::$section->section_name = $request->section_name;
        self::$section->capacity = $request->capacity;
        self::$section->note = $request->note;
        self::$section->status = $request->status == 'on' ? 1 : 0;
        self::$section->slug = str_replace(' ', '-', $request->section_name);
        self::$section->save();
    }

//    public function students()
//    {
//        return $this->hasMany(Student::class);
//    }
//
//    public function routines()
//    {
//        return $this->hasMany(Routine::class);
//    }
//
//    public function assignments()
//    {
//        return $this->hasMany(Assignment::class);
//    }
//
//    public function examSchedules()
//    {
//        return $this->hasMany(ExamSchedule::class);
//    }
//
//    public function examAttendances()
//    {
//        return $this->hasMany(ExamAttendance::class);
//    }
//
//    public function examMarks()
//    {
//        return $this->hasMany(ExamMark::class);
//    }
//
//    public function examQuestions()
//    {
//        return $this->hasMany(ExamQuestion::class);
//    }
//
//    public function studentFeePayments()
//    {
//        return $this->hasMany(StudentFeePayment::class);
//    }
}
