<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Information;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

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

    public function carender($id)
    {

        $all = Information::where('id', '=', $id)
                            ->first();

        return view('gym_carender',[
            'info' => $all,
        ]);
    }



    public function reserve(Request $request,$id)
    {
        $date = $request['date'];
        $all = Information::join('times', 'times.id', '=', 'informations.time_id')
                            ->where('informations.id', '=', $id)
                            ->first();

        return view('gym_reserve_list',[
            'info' => $all,
            'terms' => config('const.term'),
            'date' => $date,
        ]);
    }






    public function createUserReserve(Request $request,$userId, $infoId, $term)
    {
        $date = $request->date;
        $user = Auth::user()->first();
        $info = Information::where('id',$infoId)->first();
        $config_term = config('const.term');

        return view('gym_reserve_registration',[
            'info' => $info,
            'userId' => $userId,
            'term' => $config_term[$term],
            'date' => $date,
            'user' => $user,
        ]);
    }

    

}
