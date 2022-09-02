<?php
namespace App\Services;

class Media {
    public static function upload($image,$pathTo) :string
    {
        $photoName = $image->hashName();
        $photoPath = public_path("images\\{$pathTo}");
        $image->move($photoPath,$photoName);
        return $photoName;
    }

    public static function delete($dir,$oldPhotoName) :bool
    {
        $photoPath = public_path("images". DIRECTORY_SEPARATOR .$dir);
        $oldImagePath = $photoPath . DIRECTORY_SEPARATOR . $oldPhotoName;
        if(file_exists($oldImagePath)){
            unlink($oldImagePath);
            return true;
        }
        return false;
    }
}
