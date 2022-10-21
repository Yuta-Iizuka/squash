<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Information;

use App\Reserve;

use App\User;

use App\InformationUser;

use App\Event;

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
        $id = Auth::id();

        $information= new Information;

        $user = User::find($id);   
        
        if($user->division == 1){
            if(empty($user->info[0]->id)){
                return view('gym_create_info');
            }else{
                $id = $user->info[0];

                return view('gym_home',[
                    'informations' => $id,
                ]);
            }
            
        }else if($user->division == 2){
            $all = $information
            ->where('check_id', '=', 1)
            ->get()
            ->toArray();

            return view('admin_home',[
                'admin' => $all,
            ]);
        }else{
            unset($user);
        }
            $all = $information
                ->where('check_id', '=', 0)
                ->get()
                ->toArray();
        
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserving = new Reserve;

        $columns = ['information_id', 'date',  'user_id', 'name', 'tel', 'email', 'member','term'];
        foreach($columns as $column){
             $reserving->$column = $request->$column;
        }

        $reserving->save();

        return view('user_reserve_complete');
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
        $reserve = Reserve::join('informations', 'informations.id', '=', 'reserves.information_id')
                            ->where('reserves.id', '=', $id)
                            ->first();                

        return view('reserve_edit',[
        'reservation' => $reserve,
        'reserve_id' => $id,
        ]);
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
        return view('reserve_edit_complete',[
 
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function carender($id)
    {

        $all = Information::where('id', '=', $id)
                            ->first();

        return view('user_carender',[
            'info' => $all,
        ]);
    }



    public function reserve(Request $request,$id)
    {
        $date = $request['date'];
        $all = Information::join('times', 'times.id', '=', 'informations.time_id')
                            ->where('informations.id', '=', $id)
                            ->first();                  

        return view('user_reserve_list',[
            'info' => $all,
            'terms' => config('const.term'),
            'date' => $date,
        ]);
    }

    public function createUserReserve($userId, $infoId, $date, $term )
    {
        $user = Auth::user();
        $info = Information::where('id',$infoId)->first();
        $config_term = config('const.term');
      

        return view('user_reserve_registration',[
            'info' => $info,
            'userId' => $userId,
            'term' => $config_term[$term],
            'user' => $user,
            'date' => $date,
        ]);
    }

// ユーザーのマイページ（キャンセルできるところ）
    public function userMypage()
    {
        $reserve = Reserve::where('user_id', '=', \Auth::user()->id)
                            ->get();

        $information= Information::join('reserves', 'reserves.information_id', '=', 'informations.id')
                                    ->where('reserves.user_id', '=', \Auth::user()->id)
                                    ->select('informations.name')
                                    ->first();       

        return view('user_mypage',[
            'reservation' => $reserve,
            'info' => $information,
        ]);
    }

    // ユーザーのマイページ→キャンセル確認へ
    public function reserveDelete($id)
    {

        $reserve = Reserve::join('informations', 'informations.id', '=', 'reserves.information_id')
                            ->where('reserves.id', '=', $id)
                            ->first();                

        return view('user_reserve_delete',[
            'reservation' => $reserve,
            'reserve_id' => $id,
        ]);
    }
    
    // キャンセル実施
    public function deleteComplete(Request $request,$id)
    {
        $reserve = Reserve::find($id);

        $reserve->delete();
        return view('user_reserve_delete_complete');
    }
    
    // 施設の新規登録ページへ
    public function gymCreate()
    {
        return view('gym_create');
    }

    // 施設のユーザー新規登録
    public function newGymCreate(Request $request)
    {
        $users = new User;

        $columns = ['name', 'tel',  'email', 'password', 'division'];
        foreach($columns as $column){
            $users->$column = $request->$column;
        }

        $users->save();

        return view('gym_create_info');
    }

    // 施設情報の新規登録
    public function infoNewGymCreate(Request $request)
    {
        $user = Auth::id();

        $info = new Information;

        $columns = ['event_id','time_id','name', 'prif','city','adress','station',  'access','tel', 'holiday', 'start_time','end_time','price','lat','lng','check_id',];
        foreach($columns as $column){
            $info->$column = $request->$column;
        }

        $info->save();

        $info->user()->attach($user);



        return view('gym_create_complete');
    }

    // 施設管理者のホーム
    public function gymHome()
    {
        return view('gym_home');
    }

    // 施設管理者のホーム→施設オーダーの詳細へ
    public function adminGymOrder($id)
    {
        $all = Information::where('id', '=', $id)->get()->toArray();

        return view('admin_gym_order',[
            'admin' => $all,
        ]);
    }

    public function adminGymOrderComplete(Request $request,$id)
    {
        $record = Information::find($id);

        $record->check_id = '0';

        $record->save();
        
        return view('admin_gym_order_complete');
    }

    public function eventCreate()
    {
        $user = Auth::user();
        $id = $user->info[0]->id;
        $information = new Information;
        return view('event_create',[
            'id' => $id,
            'info' => $information,
        ]);
    }
    
    public function eventCreateComplete(Request $request)
    {
        $event = new Event;

        $columns = ['information_id','date','event_name'];
        foreach($columns as $column){
            $event->$column = $request->$column;
        }

        $event->save();
        
        return view('event_create_complete');
    }

    // イベント編集トップ
    public function eventList()
    {
        $user = Auth::user();
        $id = $user->info[0]->id;

        $event = Event::where('information_id', '=', $id)
                        ->get()
                        ->toArray();
       

        return view('event_list',[
            'events' => $event,

        ]);
    }

        // イベント編集ページへ
        public function eventEdit($id)
        {
            $event = Event::where('id', '=', $id)
                            ->get()
                            ->toArray();

             return view('event_edit',[
                'events' => $event,
            ]);
        }

        public function eventEditComplete(Request $request,$id)
        {
            $event = new Event;
            $record = $event->find($id);

            $columns = ['information_id','date','event_name'];
            foreach($columns as $column){
                $record->$column = $request->$column;
            }
    
            $record->save();            
    
            return view('event_edit_complete',[
            ]);
        }
        //施設の予約のカレンダー表示 
        public function gymCarender($id)
        {
    
            $all = Information::where('id', '=', $id)
                                ->first();
    
            return view('gym_carender',[
                'info' => $all,
            ]);
        }
        // 施設予約の時間表示
        public function gymReserve(Request $request,$id)
        {
            $date = $request['date'];
            $all = Information::join('times', 'times.id', '=', 'informations.time_id')
                                ->where('informations.id', '=', $id)
                                ->first();                   
    
            return view('gym_reserve_list',[
                'info' => $all,
                'terms' => config('const.term'),
                'date' => $date,
                'id' => $id,
            ]);
        }

        // 施設の予約確認ページへ
        public function createGymReserve($userId, $id, $date, $term )
        {
            $user = Auth::user();
            $info = Information::where('id',$id)->first();
            $config_term = config('const.term');
         
    
            return view('gym_reserve_registration',[
                'info' => $info,
                'userId' => $userId,
                'term' => $config_term[$term],
                'user' => $user,
                'date' => $date,
            ]);
        }


        public function reserveGymComplete(Request $request)
        {
            $reserving = new Reserve;
    
            $columns = ['information_id', 'date',  'user_id', 'name', 'tel', 'email', 'member','term'];
            foreach($columns as $column){
                 $reserving->$column = $request->$column;
            }
    
            $reserving->save();
    
            return view('gym_reserve_complete');
        }

        //施設の人が自分で予約したもの
        public function gymMypage()
        {
            $reserve = Reserve::where('user_id', '=', \Auth::user()->id)
                                ->get();

            $information= Information::join('reserves', 'reserves.information_id', '=', 'informations.id')
                                        ->where('reserves.user_id', '=', \Auth::user()->id)
                                        ->select('informations.name')
                                        ->first();       

            return view('user_mypage',[
                'reservation' => $reserve,
                'info' => $information,
            ]);
        }

        public function checkCarender($id)
        {
    
            $all = Information::where('id', '=', $id)
                                ->first();
    
            return view('check_carender',[
                'info' => $all,
            ]);
        }

        public function checkReserve(Request $request,$id)
        {
            $date = $request['date'];
            $all = Information::join('times', 'times.id', '=', 'informations.time_id')
                                ->join('reserves', 'reserves.information_id', '=', 'informations.id')
                                ->where('informations.id', '=', $id)
                                ->where('reserves.date', 'like', '%'.$date.'%')
                                ->first(); 

                                var_dump($all);
                                            
            // $reserve = Reserve::where('information_id', '=', $id)
            //                     ->get()
            //                     ->toArray();
                                
// SELECT r.term FROM informations as i JOIN reserves as r ON i.id = r.information_id WHERE i.id = 6 AND date LIKE '%10%';                              
    
            return view('check_reserve_list',[
                'info' => $all,
                'terms' => config('const.term'),
                'date' => $date,
                'id' => $id,
            ]);
        }


}
