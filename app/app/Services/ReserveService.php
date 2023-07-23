<?php
namespace App\Services;

use App\Repositories\ReserveRepository;

class ReserveService
{
    protected $ReserveRepository;

    public function __construct(
        ReserveRepository $ReserveRepository)
    {
        $this->ReserveRepository = $ReserveRepository;
    }

    public function userReserve($request)
    {
        return $this->ReserveRepository->userReserve($request);
    }

    // ユーザーの予約情報を取得
    public function getReserveInfo($id)
    {
        return $this->ReserveRepository->getReserveInfo($id);
    }

    // 予約の更新
    public function userReserveUpdate($request,$id)
    {
        return $this->ReserveRepository->userReserveUpdate($request,$id);
    }

    // 予約時間の取得
    public function reserveTerm($openTime)
    {
        $reserveTerm = [];

        foreach($openTime as $t){
            array_push($reserveTerm, $t['term']);
        }
        return $reserveTerm;
    }

    // 予約時間の取得
    public function getMypageReserve($day)
    {
        return $this->ReserveRepository->getMypageReserve($day);
    }

    public function reserveDelete($id)
    {
        return $this->ReserveRepository->reserveDelete($id);
    }

    public function getReserveList()
    {
        return $this->ReserveRepository->getReserveList();
    }

}

