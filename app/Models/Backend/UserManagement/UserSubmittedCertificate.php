<?php

namespace App\Models\Backend\UserManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSubmittedCertificate extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'file',
        'file_type',
        'user_submitted_certificateable_id',
        'user_submitted_certificateable_type',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'user_submitted_certificates';

    private static $userSubmittedFiles;

    public static function saveUserCertificates ($files, $modelObject, $id = null)
    {
        foreach ($files as $file)
        {
            self::$userSubmittedFiles   = new UserSubmittedCertificate();
            self::$userSubmittedFiles->file   = userCertificateUpload($file, 'office-user-certificates/');
            self::$userSubmittedFiles->file_type   = $file->getClientMimeType();
            $modelObject->userSubmittedCertificates()->save(self::$userSubmittedFiles);
        }
    }

    public function user_submitted_certificateable()
    {
        return $this->morphTo();
    }
}
