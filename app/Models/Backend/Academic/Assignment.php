<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Assignment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'subject_id',
        'academic_class_id',
        'section_id',
        'title',
        'description',
        'deadline',
        'deadline_timestamp',
        'file',
        'file_type',
        'note',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'deadline_timestamp' => 'datetime',
    ];

    protected static $assignment;

    public static function updateData($request, $id)
    {
        self::$assignment = Assignment::find($id);
        self::insertData($request, self::$assignment, $id);
    }

    public static function saveData($request)
    {
        self::$assignment = new Assignment();
        self::insertData($request);
    }

    public static function insertData($request, $assignment = null, $id = null)
    {
        self::$assignment->subject_id         = $request->subject_id;
        self::$assignment->academic_class_id  = $request->academic_class_id;
        self::$assignment->section_id         = $request->section_id;
        self::$assignment->title              = $request->title;
        self::$assignment->description        = $request->description;
        self::$assignment->deadline           = $request->deadline;
        self::$assignment->deadline_timestamp = Carbon::parse($request->deadline)->timestamp;
        self::$assignment->file               = isset($id) ? fileUpload($request->file('file'),'assignmentFiles/','assignment-file',self::$assignment->file) : fileUpload($request->file('file'),'assignmentFiles/','assignment-files');
        self::$assignment->file_type          = $request->hasFile('file') ? $request->file('file')->getClientMimeType() : (isset($id) ? $assignment->file_type : null);
        self::$assignment->note               = $request->note;
        self::$assignment->status             = $request->status == 'on' ? 1 : 0;
        self::$assignment->slug               = str_replace(' ', '-', $request->title);
        self::$assignment->save();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }
}
