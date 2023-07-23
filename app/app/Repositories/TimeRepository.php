<?php

namespace App\Repositories;

use App\Time;

use Illuminate\Support\Facades\DB;

class TimeRepository
{
    public static function newTimeCreate($request,$id)
    {
        $time = new Time;
        $columns = ['term_1','term_2', 'term_3', 'term_4', 'term_5', 'term_6', 'term_7', 'term_8', 'term_9', 'term_10', 'term_11', 'term_12', 'term_13', ];
        foreach($columns as $column){
        $time->$column = $request->$column;
        }
        $time->save();

        $info_id = $time['id'];

        DB::table('informations')->where('id', '=', $id)
                                  ->update(['time_id' => $info_id]);

    }


}
