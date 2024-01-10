<?php

namespace App\Models\Backend;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'title_bangla',
        'position_number',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    private static $designation;

    public static function saveOrUpdate($request, $id = null)
    {
        Designation::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'title_bangla'  => $request->title_bangla,
            'position_number'   => $request->position_number,
            'slug'  => str_replace(' ', '-', $request->slug),
            'status'    => $request->status == 'on' ? 1 : 0,
        ]);
    }

//    public function teachers()
//    {
//        return $this->hasMany(Teacher::class);
//    }
//
//    public function academicStuffs()
//    {
//        return $this->hasMany(AcademicStuff::class);
//    }
}
