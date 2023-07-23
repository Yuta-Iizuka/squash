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
use App\Services\userServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class userRepository
{
    public static function getUserId()
    {
        $id = Auth::user();
        return $id;
    }
    public static function getUser()
    {
        $id = Auth::user();
        $user = User::find($id);
        return $user;
    }

    public static function getGymId()
    {
        $user = Auth::id();
        return $user;
    }

    public function newGymCreate($request)
    {
        $users = new User;

        $columns = ['name', 'tel',  'email', 'password', 'division'];
        foreach($columns as $column){
            $users->$column = $request->$column;
        }
        $users->save();
    }

}
