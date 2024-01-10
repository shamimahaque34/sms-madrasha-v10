<?php

namespace App\Models\Backend\UserManagement;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParentInfo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'username',
        'name_english',
        'name_bangla',
        'email',
        'phone',
        'fathers_profession',
        'mothers_profession',
        'dob',
        'dob_timestamp',
        'gender',
        'religion',
        'image',
        'address',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'parent_infos';

    protected static $parentInfo;

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($parentInfo) {
            if (file_exists($parentInfo->image))
            {
                unlink($parentInfo->image);
            }
            if (isset($parentInfo->user))
            {
                $parentInfo->user->delete();
            }
            if (!empty($parentInfo->students))
            {
                $parentInfo->students->each->delete();
            }
        });
    }

    public static function saveOrUpdateParent ($request, $userId = null, $id = null)
    {
        ParentInfo::updateOrCreate(['id' => $id], [
            'user_id'               => $userId,
            'username'              => $request->username,
            'name_english'          => $request->name_english,
            'name_bangla'           => $request->name_bangla,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'fathers_profession'    => $request->fathers_profession,
            'mothers_profession'    => $request->mothers_profession,
            'dob'                   => $request->dob,
            'dob_timestamp'         => strtotime($request->dob),
            'gender'                => $request->gender,
            'religion'              => $request->religion,
            'image'                 => isset($id) ? imageUpload($request->file('image'), 'parent-images/', 'parent-image','350', 600, ParentInfo::find($id)->image) : imageUpload($request->file('image'), 'parent-images/', 'parent-image','350', 600),
            'address'               => $request->address,
            'slug'                  => str_replace(' ', '-', $request->name_english),
            'status'                => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
}
