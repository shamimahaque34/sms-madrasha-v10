<?php

namespace App\Models\Backend\UserManagement;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Database\Factories\AdminFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Admin extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'name_english',
        'name_bangla',
        'username',
        'email',
        'phone',
        'dob',
        'dob_timestamp',
        'gender',
        'religion',
        'image',
        'address',
        'slug',
        'status',
    ];
    protected static function newFactory()
    {
        return AdminFactory::new();
    }

    protected $searchableFields = ['*'];

    protected $casts = [
        'dob_timestamp' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function saveOrUpdate($request, $user_id ,$id = null)
    {
        $admin =  Admin::updateOrCreate(['id' => $id],[
            'user_id'               => $user_id,
            'name_english'          => $request->name_english,
            'name_bangla'           => $request->name_bangla,
            'username'              => $request->username,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'dob'                   => $request->dob,
            'dob_timestamp'         => strtotime($request->dob),
            'gender'                => $request->gender,
            'religion'              => $request->religion,
            'image'                 => imageUpload($request->file('image'), 'user/admin/','admin-profile-image',300,300, (isset($id) ? Admin::find($id)->image : '')),
            'address'               => $request->address,
            'slug'                  => str_replace(' ','-', Str::lower($request->name_english)),
            'status'                => 1
        ]);
        return $admin;
    }
}
