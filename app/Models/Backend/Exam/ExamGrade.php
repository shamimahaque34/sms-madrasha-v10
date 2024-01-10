<?php

namespace App\Models\Backend\Exam;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamGrade extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'grade_name',
        'point',
        'mark_form',
        'mark_to',
        'note',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'exam_grades';

    protected static $grade;

    public static function updateData($request,$id){
        self::$grade=ExamGrade::find($id);
        self::insertData($request,self::$grade);
    }

    public static function saveData($request){
        self::$grade=new ExamGrade();
        self::insertData($request);
    }

    public static function insertData($request,$grade=null){
        self::$grade-> grade_name                         =$request->grade_name;
        self::$grade-> point                              =$request->point;
        self::$grade-> mark_form                          =$request->mark_form;
        self::$grade-> mark_to                            =$request->mark_to;
        self::$grade-> note                               =$request->note;
        self::$grade-> slug                               =str_replace('','-',$request->grade_name);
        self::$grade-> status                             =$request->status == 'on' ? 1 : 0;
        self::$grade->save();
    }
}
