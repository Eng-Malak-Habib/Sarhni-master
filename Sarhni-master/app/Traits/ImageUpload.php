<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


Trait ImageUpload
{
    function uploadImage($image, $directory, $quality, $width = false, $height = false): string
    {
        // making a name to the image
        $file_extension = $image->getClientOriginalExtension();
        $file_name = Str::random(20) . '.' . $file_extension;

        // creating the directory that the image will be saved in
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }


        // we tell the package what is the image
        $image_resize = Image::make($image->getRealPath());

        if ($width == true or $height == true) {
            $image_resize->resize($width, $height);
            $image_resize->save($directory . '/' . $file_name, $quality);
        } else {
            $image_resize->save($directory . '/' . $file_name, $quality);
        }

        return $directory . '/' . $file_name;
    }
}




