<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'academic_year_id',
        'academic_class_id',
        'section_id',
        'month',
        'date',
        'date_timestamp',
        'attendanceable_id',
        'attendanceable_type',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'date',
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function attendanceable()
    {
        return $this->morphTo();
    }
}
