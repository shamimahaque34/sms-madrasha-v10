<?php

namespace App\Models\Backend\Exam;

use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\UserManagement\Student;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamAttendance extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'exam_id',
        'exam_schedule_id',
        'student_id',
        'section_id',
        'academic_class_id',
        'date',
        'is_present',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'exam_attendances';

    protected $casts = [
        'date' => 'date',
    ];

    protected static $examAttendance;

    public static function saveExamAttendance ($request)
    {
        foreach ($request->student_id as $key => $studentId)
        {
            self::$examAttendance = new ExamAttendance();
            self::$examAttendance->exam_id  = $request->exam_id;
            self::$examAttendance->academic_class_id  = $request->academic_class_id;
            self::$examAttendance->section_id  = $request->section_id;
            self::$examAttendance->exam_schedule_id  = $request->exam_schedule_id;
            self::$examAttendance->student_id  = $studentId;
            self::$examAttendance->date  = $request->date;
            foreach ($request->status as $index => $status)
            {
                if ($key == $index)
                {
                    self::$examAttendance->is_present  = $status == 'on' ? 1 : 0;
                }
            }
            self::$examAttendance->save();
        }
    }

    public static function updateAttendance($request)
    {
        foreach ($request->student_id as $key => $studentId)
        {
            foreach ($request->exam_attendance_id as $attIndex => $attendance)
            {
                if ($key == $attIndex)
                {
                    self::$examAttendance = ExamAttendance::find($attendance);
                }
            }
            self::$examAttendance->exam_id  = $request->exam_id;
            self::$examAttendance->academic_class_id  = $request->academic_class_id;
            self::$examAttendance->section_id  = $request->section_id;
            self::$examAttendance->exam_schedule_id  = $request->exam_schedule_id;
            self::$examAttendance->student_id  = $studentId;
            self::$examAttendance->date  = $request->date;
            foreach ($request->status as $index => $status)
            {
                if ($key == $index)
                {
                    self::$examAttendance->is_present  = $status == 'on' ? 1 : 0;
                }
            }
            self::$examAttendance->save();
        }
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function examSchedule()
    {
        return $this->belongsTo(ExamSchedule::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }
}
