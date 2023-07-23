<?php
namespace App\Services;

use App\Repositories\userRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $UserRepository;

    public function __construct(
        UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function getUserId()
    {
        return $this->UserRepository->getUserId();
    }

    public function getUser()
    {
        return $this->UserRepository->getUser();
    }

    public function getGymId()
    {
        return $this->UserRepository->getGymId();
    }

    public function newGymCreate($request)
    {
        return $this->UserRepository->newGymCreate($request);
    }
}

