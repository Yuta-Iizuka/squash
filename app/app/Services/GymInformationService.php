<?php
namespace App\Services;

use App\Repositories\GymInformationRepository;
use Illuminate\Support\Facades\Auth;

class GymInformationService
{
    protected $GymInformationRepository;

    public function __construct(
        GymInformationRepository $GymInformationRepository)
    {
        $this->GymInformationRepository = $GymInformationRepository;
    }

    public function getGymInformation()
    {
        return $this->GymInformationRepository->getGymInformation();
    }
    // 管理者が許可した施設のみ表示
    public function getCheckInfo($information)
    {
        $check_info = $information->where('check_id', '=', 0)
                                    ->get();
        return $check_info;
    }

    public function getSearchInfo($keyword)
    {
        return $this->GymInformationRepository->getSearchInfo($keyword);
    }

    public function getGymInformationId($id)
    {
        return $this->GymInformationRepository->getGymInformationId($id);
    }

    public function getOpenTime($id,$date)
    {
        return $this->GymInformationRepository->getOpenTime($id,$date);
    }

    public function getTermInfo($id)
    {
        return $this->GymInformationRepository->getTermInfo($id);
    }

    public function newInfoCreate($user,$request)
    {
        return $this->GymInformationRepository->newInfoCreate($user,$request);
    }

    public function gymApproval($id)
    {
        return $this->GymInformationRepository->gymApproval($id);
    }

    public function getAllGymInfo()
    {
        return $this->GymInformationRepository->getAllGymInfo();
    }

    public function getGymInformationList()
    {
        return $this->GymInformationRepository->getGymInformationList();
    }
}
