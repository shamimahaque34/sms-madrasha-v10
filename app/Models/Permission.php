<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    use HasFactory;

    protected $fillable   = ['title'];

    protected static $permission;

    public static function saveData ($request)
    {
        Permission::create([
            'title' => $request->title,
            'slug'  => str_replace(' ','-', Str::lower($request->title)),
        ]);
    }
}
