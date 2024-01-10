<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_title',
        'site_name',
        'system_email',
        'institute_phone',
        'footer',
        'currency_code',
        'currency_symbol',
        'change_language',
        'default_language',
        'institute_division',
        'institute_district',
        'institute_address',
        'site_favicon',
        'site_logo',
        'site_banner',
        'site_meta',
    ];

    public static $setting;

    public static function storeOrUpdate ($request, $id = null)
    {
        self::$setting = isset($id) ? Settings::findOrFail($id) : new Settings();
        if ($request->setting_category == 'general')
        {
            self::$setting->site_title            = $request->site_title;
            self::$setting->site_name             = $request->site_name;
            self::$setting->system_email          = $request->system_email;
            self::$setting->institute_phone       = $request->institute_phone;
            self::$setting->footer                = $request->footer;
            self::$setting->currency_code         = $request->currency_code;
            self::$setting->currency_symbol       = $request->currency_symbol;
            self::$setting->change_language       = $request->change_language;
            self::$setting->default_language      = $request->default_language;
            self::$setting->institute_division    = $request->institute_division;
            self::$setting->institute_district    = $request->institute_district;
            self::$setting->institute_address     = $request->institute_address;
            self::$setting->site_favicon          = imageUpload($request->file('site_favicon'),'site-info/','favicon','16','16',isset(self::$setting->site_favicon) ? self::$setting->site_favicon : '' );
            self::$setting->site_logo             = imageUpload($request->file('site_logo'),'site-info/','logo',null, null,isset(self::$setting->site_logo) ? self::$setting->site_logo : '' );
            self::$setting->site_banner           = imageUpload($request->file('site_banner'),'site-info/','banner',null,null,isset(self::$setting->site_banner) ? self::$setting->site_banner : '' );
            self::$setting->site_meta             = $request->site_meta;
        }
        self::$setting->save();
//        Settings::updateOrCreate(['id' => $id],[
//            'site_title'            => $request->site_title,
//            'site_name'             => $request->site_name,
//            'system_email'          => $request->system_email,
//            'institute_phone'       => $request->institute_phone,
//            'footer'                => $request->footer,
//            'currency_code'         => $request->currency_code,
//            'currency_symbol'       => $request->currency_symbol,
//            'change_language'       => $request->change_language,
//            'default_language'      => $request->default_language,
//            'institute_division'    => $request->institute_division,
//            'institute_district'    => $request->institute_district,
//            'institute_address'     => $request->institute_address,
//            'site_favicon'          => $request->site_favicon,
//            'site_logo'             => $request->site_logo,
//            'site_banner'           => $request->site_banner,
//            'site_meta'             => $request->site_meta,
//        ]);
    }
}
