<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'educational_stage_id',
        'updated_by',
        'student_group_id',
        'academic_class_id',
        'subject_name',
        'subject_type',
        'pass_mark',
        'final_mark',
        'point',
        'subject_author',
        'subject_code',
        'subject_book_image',
        'is_for_graduation',
        'is_main_subject',
        'is_optional',
        'note',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected static $subject;

    public static function saveOrUpdateSubject($request, $id = null)
    {
        Subject::updateOrCreate(['id' => $id], [
            'educational_stage_id'      => $request->educational_stage_id,
            'updated_by'                => auth()->id(),
            'student_group_id'          => $request->student_group_id,
            'academic_class_id'         => $request->academic_class_id,
            'subject_name'              => $request->subject_name,
            'subject_type'              => $request->subject_type,
            'pass_mark'                 => $request->pass_mark,
            'final_mark'                => $request->final_mark,
            'point'                     => $request->point,
            'subject_author'            => $request->subject_author,
            'subject_code'              => $request->subject_code,
            'subject_book_image'        => isset($id) ? imageUpload($request->file('subject_book_image'), 'subject-book-images/', 'sub-book', '400', '650', Subject::find($id)->subject_book_image) : imageUpload($request->file('subject_book_image'), 'subject-book-images/', 'sub-book-', '400', '650'),
            'is_for_graduation'         => $request->is_for_graduation == 'on' ? 1 : 0,
            'is_main_subject'           => $request->is_main_subject == 'on' ? 1 : 0,
            'is_optional'               => $request->is_optional == 'on' ? 1 : 0,
            'note'                      => $request->note,
            'slug'                      => str_replace(' ', '-', $request->subject_name),
            'status'                    => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function educationalStage()
    {
        return $this->belongsTo(EducationalStage::class);
    }

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class);
    }

//    public function student_main_subjects()
//    {
//        return $this->hasMany(Student::class, 'main_subject_id');
//    }
//
//    public function student_optional_subjects()
//    {
//        return $this->hasMany(Student::class, 'optional_subject_id');
//    }
//
//    public function routine()
//    {
//        return $this->hasOne(Routine::class);
//    }
//
//    public function assignments()
//    {
//        return $this->hasMany(Assignment::class);
//    }
//
//    public function examSchedule()
//    {
//        return $this->hasOne(ExamSchedule::class);
//    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

//    public function syllabus()
//    {
//        return $this->hasOne(Syllabus::class);
//    }
//
//    public function examQuestions()
//    {
//        return $this->hasMany(ExamQuestion::class);
//    }
//
//    public function questions()
//    {
//        return $this->hasMany(Question::class);
//    }
}
