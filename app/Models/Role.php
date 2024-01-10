<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected static $role;

    public static function saveData ($request)
    {
        self::$role = Role::create([
            'title' => $request->title,
            'slug' => str_replace(' ','-', Str::lower($request->title)),
        ]);
        self::$role->permissions()->sync($request->permissions);
    }

    public function permissions ()
    {
        return $this->belongsToMany(Permission::class);
    }
}
