<?php

namespace App\Models\Backend\Academic;

use App\Models\Backend\UserManagement\Teacher;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Routine extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'teacher_id',
        'class_schedule_id',
        'section_id',
        'subject_id',
        'academic_year_id',
        'academic_class_id',
        'day',
        'room',
        'note',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected static $routine;

    public static function updateData($request, $id)
    {
        self::$routine = routine::find($id);
        self::insertData($request, self::$routine);
    }

    public static function saveData($request)
    {
        self::$routine = new routine();
        self::insertData($request);
    }

    public static function insertData($request, $routine = null)
    {
        self::$routine->teacher_id        = $request->teacher_id;
        self::$routine->class_schedule_id = $request->class_schedule_id;
        self::$routine->section_id        = $request->section_id;
        self::$routine->subject_id        = $request->subject_id;
        self::$routine->academic_year_id  = $request->academic_year_id;
        self::$routine->academic_class_id = $request->academic_class_id;
        self::$routine->day               = $request->day;
        self::$routine->room              = $request->room;
        self::$routine->note              = $request->note;
        self::$routine->status            = $request->status == 'on' ? 1 : 0;
        self::$routine->save();
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classSchedule()
    {
        return $this->belongsTo(ClassSchedule::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }
}
