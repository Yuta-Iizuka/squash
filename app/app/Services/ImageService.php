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

}

