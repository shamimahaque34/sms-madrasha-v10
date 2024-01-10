<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicClass extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'educational_stage_id',
        'class_name',
        'class_numeric',
        'note',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'academic_classes';

    protected static $academicClass;

    public static function updateData($request, $id)
    {
        self::$academicClass = AcademicClass::find($id);
        self::insertData($request, self::$academicClass);
    }

    public static function saveData($request)
    {
        self::$academicClass = new AcademicClass();
        self::insertData($request);
    }

    public static function insertData($request, $academicClass = null)
    {
        self::$academicClass->educational_stage_id = $request->educational_stage_id;
        self::$academicClass->class_name           = $request->class_name;
        self::$academicClass->class_numeric        = $request->class_numeric;
        self::$academicClass->note                 = $request->note;
        self::$academicClass->status               = $request->status == 'on' ? 1 : 0;
        self::$academicClass->slug                 = str_replace(' ', '-', $request->class_name);
        self::$academicClass->save();
    }

//    public function students()
//    {
//        return $this->hasMany(Student::class);
//    }

    public function educationalStage()
    {
        return $this->belongsTo(EducationalStage::class);
    }

//    public function subjects()
//    {
//        return $this->hasMany(Subject::class);
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
//    public function attendances()
//    {
//        return $this->hasMany(Attendance::class);
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
//    public function questionBanks()
//    {
//        return $this->hasMany(Question::class);
//    }
//
//    public function examQuestions()
//    {
//        return $this->hasMany(ExamQuestion::class);
//    }
//
//    public function promotedClassPromotions()
//    {
//        return $this->hasMany(ClassPromotion::class, 'promoted_class_id');
//    }
//
//    public function currentClassPromotions()
//    {
//        return $this->hasMany(ClassPromotion::class, 'current_class_id');
//    }
//
//    public function studentFeePayments()
//    {
//        return $this->hasMany(StudentFeePayment::class);
//    }
//
//    public function libraryEbooks()
//    {
//        return $this->hasMany(LibraryEbook::class);
//    }
}
