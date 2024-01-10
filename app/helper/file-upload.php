<?php

use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\File;

function imageUpload ($image, $imageDirectory, $imageNameString = null, $width = null, $height = null, $modelFileUrl = null)
{
    if ($image)
    {
        if (isset($modelFileUrl))
        {
            if (file_exists($modelFileUrl))
            {
                unlink($modelFileUrl);
            }
        }
        $folderPath = public_path('backend/assets/uploaded-files/'.rtrim($imageDirectory));
        if (!File::isDirectory($folderPath))
        {
            File::makeDirectory($folderPath, 0777, true, true);
        }
        $imageName = (isset($imageNameString) ? $imageNameString : '').'-'.time().rand(10,1000).'.'.$image->getClientOriginalExtension();
        $imageUrl = 'backend/assets/uploaded-files/'.$imageDirectory.$imageName;
        if ($image->getClientOriginalExtension() == 'ico')
        {
            $image->move($imageDirectory, $imageName);
        } else {

            Image::make($image)->resize((isset($width) ? $width : ''), (isset($height) ? $height : ''))->encode('jpeg',80)->save($imageUrl);
        }
    } else {
        $imageUrl = $modelFileUrl;
    }
    return $imageUrl;
}

function userCertificateUpload ($fileObject, $directory, $nameString = null)
{
    if ($fileObject)
    {
        $fileName       = str_replace(' ', '-', $fileObject->getClientOriginalName()).'~'.rand(100,100000).'.'.$fileObject->extension();
        $fileDirectory  = 'backend/assets/uploaded-files/'.$directory;
        $fileObject->move($fileDirectory, $fileName);
        return $fileDirectory.$fileName;
    } else {
        return null;
    }
}

function fileUpload ($fileObject, $directory, $nameString = null, $modelFileUrl = null)
{
    if ($fileObject)
    {
        if (isset($modelFileUrl))
        {
            if (file_exists($modelFileUrl))
            {
                unlink($modelFileUrl);
            }
        }
        $fileName       = $nameString.str_replace(' ', '-', pathinfo($fileObject->getClientOriginalName(), PATHINFO_FILENAME)).'_'.rand(100,100000).'.'.$fileObject->extension();
        $fileDirectory  = 'backend/assets/uploaded-files/'.$directory.'/';
        $fileObject->move($fileDirectory, $fileName);
        return $fileDirectory.$fileName;
    } else {
        if (isset($modelFileUrl))
        {
            return $modelFileUrl;
        } else {
            return null;
        }
    }
}

function getFileExtension($file)
{
    return $file->extension();
}
function getFileType($file)
{
    return $file->getMimeType();
}
