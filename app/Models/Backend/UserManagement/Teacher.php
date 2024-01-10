<?php

namespace App\Models\Backend\UserManagement;

use App\Models\Backend\Designation;
use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Teacher extends Model
{
    use HasFactory;
    use Searchable;

    private static $teacher;

    protected $fillable = [
        'user_id',
        'created_by',
        'username',
        'name_english',
        'name_bangla',
        'email',
        'phone',
        'designation_id',
        'dob',
        'dob_timestamp',
        'mpo_index_number',
        'bank_name',
        'bank_account_no',
        'gender',
        'religion',
        'jod',
        'jod_timestamp',
        'image',
        'address',
        'subject',
        'highest_education',
        'slug',
        'status',
        'salary_grade_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'dob_timestamp' => 'datetime',
        'jod_timestamp' => 'datetime',
    ];

    public static function saveOrUpdateTeacher($request, $userId = null, $id = null)
    {

        return Teacher::updateOrCreate(['id' => $id],[
            'user_id'               => $userId,
            'created_by'            => auth()->id(),
            'username'              => $request->username,
            'name_english'          => $request->name_english,
            'name_bangla'           => $request->name_bangla,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'designation_id'        => $request->designation_id,
            'dob_timestamp'         => strtotime($request->dob),
            'dob'                   => Carbon::parse($request->dob)->format('m/d/Y'),
            'mpo_index_number'      => $request->mpo_index_number,
            'bank_name'             => $request->bank_name,
            'bank_account_no'       => $request->bank_account_no,
            'gender'                => $request->gender,
            'religion'              => $request->religion,
            'jod_timestamp'         => strtotime($request->jod),
            'jod'                   => Carbon::parse($request->jod)->format('m/d/Y'),
            'image'                 => imageUpload($request->file('image'),'user/teacher/','teacher-profile-image',300, 300, (isset($id) ? Teacher::find($id)->image : '')),
            'address'               => $request->address,
            'subject'               => $request->subject,
            'highest_education'     => $request->highest_education,
            'slug'                  => str_replace(' ', '-', $request->name_english),
            'salary_grade_id'       => $request->salary_grade_id,
            'status'                => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacher_creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

//    public function routines()
//    {
//        return $this->hasMany(Routine::class);
//    }
//
//    public function hostelMember()
//    {
//        return $this->hasOne(HostelMember::class);
//    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function userSubmittedCertificates()
    {
        return $this->morphMany(
            UserSubmittedCertificate::class,
            'user_submitted_certificateable'
        );
    }
//
//    public function attendances()
//    {
//        return $this->morphMany(Attendance::class, 'attendanceable');
//    }
}
