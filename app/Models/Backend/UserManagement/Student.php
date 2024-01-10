<?php

namespace App\Models\Backend\UserManagement;

use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Academic\StudentGroup;
use App\Models\Backend\Academic\Subject;
use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'parent_id',
        'section_id',
        'student_group_id',
        'main_subject_id',
        'optional_subject_id',
        'academic_class_id',
        'name_english',
        'name_bangla',
        'username',
        'email',
        'phone',
        'dob',
        'dob_timestamp',
        'gender',
        'blood_group',
        'registration_no',
        'roll_no',
        'religion',
        'address',
        'division',
        'district',
        'state',
        'country',
        'image',
        'extra_activities',
        'remarks',
        'slug',
        'status',
    ];

    private static $student;

    public static function saveOrUpdateStudent ($request, $userId = null, $id = null)
    {
        return Student::updateOrCreate(['id' => $id], [
            'user_id'               => $userId,
            'parent_id'             => $request->parent_id,
            'section_id'            => $request->section_id,
            'student_group_id'      => $request->student_group_id,
            'main_subject_id'       => $request->main_subject_id, // need features: if class is less then 9, you cant insert main subject
            'optional_subject_id'   => $request->optional_subject_id, // need features: if class is less then 9, you cant insert optional subject
            'academic_class_id'     => $request->academic_class_id,
            'name_english'          => $request->name_english,
            'name_bangla'           => $request->name_bangla,
            'username'              => $request->username,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'dob'                   => $request->dob,
            'dob_timestamp'         => strtotime($request->dob),
            'gender'                => $request->gender,
            'blood_group'           => $request->blood_group,
            'registration_no'       => $request->registration_no,
            'roll_no'               => $request->roll_no,
            'religion'              => $request->religion,
            'address'               => $request->address,
            'division'              => $request->division,
            'district'              => $request->district,
            'state'                 => $request->state,
            'country'               => $request->country,
            'image'                 => isset($id) ? imageUpload($request->file('image'), 'user/student/', 'student', '400', 600, Student::find($id)->image) : imageUpload($request->file('image'), 'user/student/', 'student', '400', 600),
            'extra_activities'      => $request->extra_activities,
            'remarks'               => $request->remarks,
            'slug'                  => str_replace(' ', '-', $request->name_english),
            'status'                => $request->status == 'on' ? 1 : 0,
        ]);
    }

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parentInfo()
    {
        return $this->belongsTo(ParentInfo::class, 'parent_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class);
    }

    public function mainSubject()
    {
        return $this->belongsTo(Subject::class, 'main_subject_id');
    }

    public function optionalSubject()
    {
        return $this->belongsTo(Subject::class, 'optional_subject_id');
    }

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
//    public function classPromotions()
//    {
//        return $this->hasMany(ClassPromotion::class);
//    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

//    public function studentFeePayments()
//    {
//        return $this->hasMany(StudentFeePayment::class);
//    }
//
//    public function hostelMember()
//    {
//        return $this->hasOne(HostelMember::class);
//    }
//
//    public function attendances()
//    {
//        return $this->morphMany(Attendance::class, 'attendanceable');
//    }
}
