<?php

namespace App\Repositories;

use App\Image;
use Illuminate\Support\Facades\Storage;

class ImageRepository
{
    public static function getImage($id)
    {
        $image = Image::where('information_id', '=', $id)
                        ->get();
        return $image;
    }

    public static function saveImage($request,$id)
    {
        // ディレクトリ名
        $dir = 'sample';
        // アップロードされたファイル名を取得
        $file_name = $request->file('file')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('file')->storeAs('public/' . $dir, $file_name);

        // ファイル情報をDBに保存
        $image = new Image();
        $image->information_id = $id;
        $image->name = $file_name;
        $image->path = 'storage/' . $dir . '/' . $file_name;
        $image->save();

    }

    public static function deleteImage($id)
    {
        $name = Image::where('id', '=', $id)
                        ->select('name')
                        ->first();
        $delete = '/public/sample/' .$name->name;

        Storage::delete($delete);

        Image::where('id', '=', $id)
                ->delete();

    }


}
