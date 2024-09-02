<?php 
namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ImageHelper
{

    public static function uploadImages($files, $directory, $prefix = null)
    {

        if (!File::exists(public_path($directory))) {
            File::makeDirectory(public_path($directory), 0755, true);
        }

        $uploadedFiles = [];

        if (is_array($files)) {
            foreach ($files as $file) {
                $uploadedFiles[] = self::uploadSingleImage($file, $directory, $prefix);
            }
        } else {
            $uploadedFiles[] = self::uploadSingleImage($files, $directory, $prefix);
        }

        return $uploadedFiles;
    }

    private static function uploadSingleImage($file, $directory, $prefix = null)
    {
        $imageName = $file->getClientOriginalName();
        $explodedName = explode(' ', $imageName);
        $imageName = implode('_', $explodedName);
        $fileName = ($prefix ? $prefix . '_' : '') . time() . '_' . $imageName;
        $file->move(public_path($directory), $fileName);

        return $fileName;
    }
}
