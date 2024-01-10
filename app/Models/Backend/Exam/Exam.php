<?php

namespace App\Models\Backend\Exam;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'display_title',
        'exam_code',
        'date',
        'note',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'date',
    ];

    protected static $exam;

    public static function updateData($request,$id){
        self::$exam=Exam::find($id);
        self::insertData($request,self::$exam);
    }

    public static function saveData($request){
        self::$exam=new Exam();
        self::insertData($request);
    }

    public static function insertData($request,$exam=null){
        self::$exam-> title             = $request->title;
        self::$exam-> display_title     = $request->display_title;
        self::$exam-> exam_code         = $request->exam_code;
        self::$exam-> date              = $request->date;
        self::$exam-> note              = $request->note;
        self::$exam-> slug              = str_replace('','-',$request->title);
        self::$exam-> status            = $request->status == 'on' ? 1 : 0;
        self::$exam->save();
    }

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
//    public function classPromotions()
//    {
//        return $this->hasMany(ClassPromotion::class);
//    }
//
//    public function examQuestions()
//    {
//        return $this->hasMany(ExamQuestion::class);
//    }
}
