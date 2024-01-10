<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSchedule extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'starting_time',
        'starting_time_timestamp',
        'ending_time',
        'ending_time_timestamp',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'class_schedules';


    protected static $classSchedule;

    public static function saveOrUpdateClassSchedule ($request, $id=null)
    {
        ClassSchedule::updateOrCreate(['id' => $id], [
            'starting_time' => $request->starting_time,
            'starting_time_timestamp' => strtotime($request->starting_time),
            'ending_time' => $request->ending_time,
            'ending_time_timestamp' => strtotime($request->ending_time),
            'status' => $request->status == 'on' ? 1 : 0,
        ]);
    }

//    public function routine()
//    {
//        return $this->hasOne(Routine::class);
//    }
}
