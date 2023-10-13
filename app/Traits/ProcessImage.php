<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

trait ProcessImage
{
    function upload_with_modify($requestImage, $uploadPath, $existPhoto,$width,$height)
    {
        if (File::exists($existPhoto)) {
            File::delete($existPhoto);
        }
        $filename = $requestImage->getClientOriginalExtension();
        $image = Str::random(14) . '.' . $filename;

        Image::make($requestImage)->resize($width,$height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($uploadPath . $image);

        return $uploadPath . $image;
    }
    // upload an image without modify
    public function upload_without_modify($requestImage, $uploadPath, $existPhoto)
    {
        if (File::exists($existPhoto)) {
            File::delete($existPhoto);
        }
        $filename = $requestImage->getClientOriginalExtension();
        $image = Str::random(14) . '.' . $filename;
        $requestImage->move($uploadPath, $image);
        return $uploadPath . $image;
    }
    // removeImage 
    public function deleteImage($imagePath){
        if(File::exists($imagePath)){
            File::delete($imagePath);
        }
    }
}
