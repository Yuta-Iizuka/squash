<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Information;

use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information= new Information;

        $all = $information->all()->toArray();

        return view('user_home',[
            'informations' => $all,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information= new Information;

        $all = Information::where('id', '=', $id)->get()->toArray();

        return view('gym_detail',[
            'info' => $all,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function reserve($id)
    {

        $all = Information::join('times', 'times.id', '=', 'informations.time_id')
                            ->where('informations.id', '=', $id)
                            ->first();

        return view('gym_reserve_list',[
            'info' => $all,
            'terms' => config('const.term'),
        ]);
    }

    public function createUserReserve($userId, $infoId, $term)
    {
        $info = Information::where('id',$infoId)->first();
        $config_term = config('const.term');
        return view('gym_reserve_registration',[
            'info' => $info,
            'userId' => $userId,
            'term' => $config_term[$term],
        ]);
    }


}
