<?php

namespace App\Models\Backend\Exam;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamMarkDistributionType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['distribution_type', 'mark_value', 'slug', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'exam_mark_distribution_types';

    protected static $mark;

    public static function updateData($request,$id){
        self::$mark = ExamMarkDistributionType::find($id);
        self::insertData($request,self::$mark);
    }

    public static function saveData($request){
        self::$mark = new ExamMarkDistributionType();
        self::insertData($request);
    }

    public static function insertData($request,$mark=null){
        self::$mark->distribution_type      = $request->distribution_type;
        self::$mark->mark_value             = $request->mark_value;
        self::$mark->slug                   = str_replace('','-',$request->distribution_type);
        self::$mark->status                 = $request->status == 'on' ? 1 : 0;
        self::$mark->save();
    }
}
