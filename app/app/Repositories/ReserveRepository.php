<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Reserve;
use Illuminate\Support\Facades\Auth;

class ReserveRepository
{
    public static function userReserve($request)
    {
        $reserve = new Reserve;

        $columns = ['information_id', 'date',  'user_id', 'name', 'tel', 'email', 'member','term'];
        foreach($columns as $column){
             $reserve->$column = $request->$column;
        }

        $reserve->save();

        return $reserve;
    }

    public static function userReserveUpdate($request, $id)
    {
        $reserve = Reserve::find($id);
        $columns = ['information_id', 'date', 'name', 'tel', 'email', 'member','term'];

        foreach($columns as $column){
            $reserve->$column = $request->$column;
        }

        $reserve->save();

        return $reserve;
    }

    public static function getReserveInfo($id)
    {
        $reserve = Reserve::join('informations', 'informations.id', '=', 'reserves.information_id')
                            ->where('reserves.id', '=', $id)
                            ->first();

        return $reserve;
    }

    public static function getMypageReserve($day)
    {
        $reserve = Reserve::join('informations', 'informations.id', '=', 'reserves.information_id')
                            ->where('user_id', '=', Auth::user()->id)
                            ->select('reserves.id', 'informations.name', 'date', 'term')
                            ->where('date', '>=', $day)
                            ->orderBy('date', 'asc')
                            ->orderBy('term', 'asc')
                            ->get();

        return $reserve;
    }

    public static function reserveDelete($id)
    {
        $reserve = Reserve::find($id);
        $reserve->delete();

        return $reserve;
    }

    public static function getReserveList()
    {
        $reserve = Reserve::where('user_id', '=', Auth::user()->id)
                            ->get();
        return $reserve;
    }

}
