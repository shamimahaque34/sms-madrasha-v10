<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class AcademicYear extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'session_year_start',
        'session_year_end',
        'session_month_start',
        'session_month_end',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'academic_years';

    protected static $academicYear;

    public static function saveOrUpdateAcademicYear ($request, $id=null)
    {
        AcademicYear::updateOrCreate(['id' => $id], [
            'session_year_start' => $request->session_year_start,
            'session_year_end' => $request->session_year_end,
            'session_month_start' => Carbon::parse($request->session_year_start)->format('F'),
            'session_month_end' => Carbon::parse($request->session_year_end)->format('F'),
            'slug'  => Carbon::parse($request->session_year_start)->format('F-Y').'-'.Carbon::parse($request->session_year_end)->format('F-Y'),
            'status' => $request->status == 'on' ? 1 : 0,
        ]);
    }

//    public function routines()
//    {
//        return $this->hasMany(Routine::class);
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
//    public function syllabi()
//    {
//        return $this->hasMany(Syllabus::class);
//    }
//
//    public function examQuestions()
//    {
//        return $this->hasMany(ExamQuestion::class);
//    }
//
//    public function currentClassPromotions()
//    {
//        return $this->hasMany(
//            ClassPromotion::class,
//            'current_academic_year_id'
//        );
//    }
//
//    public function promotedClassPromotions()
//    {
//        return $this->hasMany(
//            ClassPromotion::class,
//            'promoted_academic_year_id'
//        );
//    }
//
//    public function studentFeePayments()
//    {
//        return $this->hasMany(StudentFeePayment::class);
//    }
//
//    public function sponsors()
//    {
//        return $this->hasMany(Sponsor::class);
//    }
}
