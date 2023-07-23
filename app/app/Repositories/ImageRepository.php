<?php

namespace App\Repositories;

use App\Image;

class ImageRepository
{
    public static function getImage($id)
    {
        $image = Image::where('information_id', '=', $id)
                        ->get();
        return $image;
    }


}
