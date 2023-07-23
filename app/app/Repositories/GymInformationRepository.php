<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Information;
use App\Reserve;
use App\User;
use App\InformationUser;
use App\Event;
use App\Time;
use App\Image;
use Carbon\Carbon;
use App\Http\Requests\CreateData;
use App\Services\UserService;
use App\Services\GymInformationService;
use App\Services\ReserveService;
use App\Services\ImageService;
use App\Services\EventService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GymInformationRepository
{
    public static function getGymInformation()
    {
        $information = new Information();
        return $information;
    }

    public static function getGymInformationId($id)
    {
        $gymInformationId = Information::where('id', '=', $id)
                        ->get()
                        ->toArray();

        return $gymInformationId;
    }

    public static function getOpenTime($id,$date)
    {
        $openTime = Information::join('times', 'times.id', '=', 'informations.time_id')
                                ->join('reserves', 'reserves.information_id', '=', 'informations.id')
                                ->select('informations.id', 'reserves.term')
                                ->where('informations.id', '=', $id)
                                ->where('reserves.date', 'like', '%'.$date.'%')
                                ->get()
                                ->toArray();

        return $openTime;
    }

    public static function getTermInfo($id)
    {
        $term_info = Information::join('times', 'times.id', '=', 'informations.time_id')
                                ->where('informations.id', '=', $id)
                                ->first();

        return $term_info;
    }

    public static function getSearchInfo($keyword)
    {
        $check_info = Information::where('check_id', '=', 0)
                                    ->where('name', 'like', '%' . $keyword . '%')
                                    ->orWhere('station','like','%'.$keyword.'%')
                                    ->orWhere('prif','like','%'.$keyword.'%')
                                    ->orWhere('city','like','%'.$keyword.'%')
                                    ->orWhere('adress','like','%'.$keyword.'%')
                                    ->orderByDesc('created_at')
                                    ->paginate(10);

        return $check_info;
    }

    public static function newInfoCreate($user,$request)
    {
        $info = new Information();
        $columns = ['event_id','time_id','name', 'prif','city','adress','station',  'access','tel', 'holiday', 'start_time','end_time','price','lat','lng','check_id',];
        foreach($columns as $column){
            $info->$column = $request->$column;
        }
        $info->save();
        $info->user()->attach($user);
        return $info;
    }


    public static function gymApproval($id)
    {
        $record = Information::find($id);
        $record->check_id = '0';
        $record->save();
    }

    // 承認された施設情報をすべて取得
    public static function getAllGymInfo()
    {
        $getAllGymInfo = Information::where('check_id', '=', 0)
                                    ->get()
                                    ->toArray();
        return $getAllGymInfo;
    }

    public static function getGymInformationList()
    {
        $information= Information::join('reserves', 'reserves.information_id', '=', 'informations.id')
                                    ->where('reserves.user_id', '=', Auth::user()->id)
                                    ->select('informations.name')
                                    ->first();
        return $information;
    }

}
