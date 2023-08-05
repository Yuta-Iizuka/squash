<?php
namespace App\Services;

use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Auth;

class ImageService
{
    protected $ImageRepository;

    public function __construct(
        ImageRepository $ImageRepository)
    {
        $this->ImageRepository = $ImageRepository;
    }

    public function getImage($id)
    {
        return $this->ImageRepository->getImage($id);
    }

    public function saveImage($request,$id)
    {
        return $this->ImageRepository->saveImage($request,$id);
    }

    public function deleteImage($id)
    {
        return $this->ImageRepository->deleteImage($id);
    }

}

