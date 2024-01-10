<?php

namespace App\Models\Backend\Academic;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Syllabus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'subject_id',
        'academic_year_id',
        'title',
        'description',
        'file',
        'file_type',
        'note',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected static $syllabus;

    public static function updateData($request, $id)
    {
        self::$syllabus = Syllabus::find($id);
        self::insertData($request, self::$syllabus, $id);
    }

    public static function saveData($request)
    {
        self::$syllabus = new Syllabus();
        self::insertData($request, self::$syllabus);
    }

    public static function insertData($request, $syllabus = null, $id = null)
    {
        $syllabus->subject_id       = $request->subject_id;
        $syllabus->academic_year_id = $request->academic_year_id;
        $syllabus->title            = $request->title;
        $syllabus->description      = $request->description;
        $syllabus->file             = isset($id) ? fileUpload($request->file('file'),'syllabusFiles/','syllabus-file', $syllabus->file) : fileUpload($request->file('file'),'syllabusFiles/','file');
        $syllabus->file_type        = $request->hasFile('file') ? $request->file('file')->getClientOriginalExtension() : (isset($id) ? $syllabus->file_type : null);
        $syllabus->note             = $request->note;
        $syllabus->status           = $request->status == 'on' ? 1 : 0;
        $syllabus->slug             = str_replace(' ', '-', $request->title);
        $syllabus->save();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
