<?php
namespace App\Services;

use App\Repositories\TimeRepository;

class TimeService
{
    protected $TimeRepository;

    public function __construct(
        TimeRepository $TimeRepository)
    {
        $this->TimeRepository = $TimeRepository;
    }

    public function newTimeCreate($request,$id)
    {
        return $this->TimeRepository->newTimeCreate($request,$id);
    }

    public function updateTime($request,$id)
    {
        return $this->TimeRepository->updateTime($request,$id);
    }
}
