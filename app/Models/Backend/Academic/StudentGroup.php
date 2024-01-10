<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentGroup extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['group_name', 'note', 'slug', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'student_groups';

    private static $studentGroup;

    public static function saveOrUpdate($request, $id = null)
    {
        StudentGroup::updateOrCreate(['id' => $id], [
            'group_name'    => $request->group_name,
            'note'    => $request->note,
            'slug'    => str_replace(' ','-',$request->group_name),
            'status'    => $request->status == 'on' ? 1 : 0,
        ]);
    }

//    public function subjects()
//    {
//        return $this->hasMany(Subject::class);
//    }
//
//    public function students()
//    {
//        return $this->hasMany(Student::class);
//    }
//
//    public function examQuestions()
//    {
//        return $this->hasMany(ExamQuestion::class);
//    }
}
