<?php

namespace App\Http\Controllers;

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


use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
            $query = Information::query();

            $keyword = $request->input('keyword');
            $all = $information
                    ->where('check_id', '=', 0)
                    ->get()
                    ->toArray();


            if (!empty($keyword)) {
                $query->where('name', 'like', '%' . $keyword . '%')
                        ->orWhere('station','like','%'.$keyword.'%')
                        ->orWhere('prif','like','%'.$keyword.'%')
                        ->orWhere('city','like','%'.$keyword.'%')
                        ->orWhere('adress','like','%'.$keyword.'%')
                        ->where('check_id', '=', 0)
                        ->get()
                        ->toArray();
                $all = $query->orderByDesc('created_at')->paginate(5);        
 
            }


   

            return view('user_home',[
                'informations' => $all,
                'keyword' => $keyword,
            ]);
        }

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

        $all = Information::where('id', '=', $id)
                            ->get()
                            ->toArray();
        $image = Image::where('information_id', '=', $id)
                        ->first();

        return view('gym_detail',[
            'info' => $all,
            'image' => $image,
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
        $user_id = Auth::user()->id;                

        return view('reserve_edit',[
        'reservation' => $reserve,
        'reserve_id' => $id,
        'user_id' => $user_id,
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
        $reserve = new Reserve;
        $record = $reserve->find($id);


        $columns = ['information_id', 'date',  'user_id', 'name', 'tel', 'email', 'member','term'];
        foreach($columns as $column){
            $record->$column = $request->$column;
        }

        $record->save();    

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



    public function reserve(CreateData $request,$id)
    {
        $date = $request['date'];
        $event = Event::where('information_id', '=', $id)
                            ->first();

        if($event->date == $date){
            return view('cannot_reserve',[
                'date' => $date,
                'event' => $event
            ]);
        }else{  
            $all = Information::join('times', 'times.id', '=', 'informations.time_id')
                                ->join('reserves', 'reserves.information_id', '=', 'informations.id')
                                ->select('informations.id', 'reserves.term')
                                ->where('informations.id', '=', $id)
                                ->where('reserves.date', 'like', '%'.$date.'%')
                                ->get()
                                ->toArray(); 
            $reserveTerm = [];
            foreach($all as $t){
                array_push($reserveTerm, $t['term']);
            }          

            $term_info = Information::join('times', 'times.id', '=', 'informations.time_id')
                        ->where('informations.id', '=', $id)
                        ->first();

            return view('user_reserve_list',[
                'info' => $reserveTerm,
                'terms' => config('const.term'),
                'date' => $date,
                'id' => $id,
                'term_info' => $term_info,
            ]);
        }    
    }

    public function createUserReserve($userId, $id, $date, $term )
    {
        $user = Auth::user();
        $info = Information::where('id',$id)->first();
        $config_term = config('const.term');

        return view('user_reserve_registration',[
            'info' => $info,
            'userId' => $userId,
            'term' => $config_term[$term],
            'user' => $user,
            'date' => $date,
        ]);
    }

// ?????????????????????????????????????????????????????????????????????
    public function userMypage()
    {
        $day=Carbon::yesterday();
        $reserve = Reserve::join('informations', 'informations.id', '=', 'reserves.information_id')
                            ->where('user_id', '=', \Auth::user()->id)
                            ->select('reserves.id', 'informations.name', 'date', 'term')
                            ->where('date', '>=', $day)
                            ->orderBy('date', 'asc')
                            ->orderBy('term', 'asc')
                            ->get();   
                                        
        return view('user_mypage',[
            'reservation' => $reserve,
        ]);
    }

    // ?????????????????????????????????????????????????????????
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
    
    // ?????????????????????
    public function deleteComplete(Request $request,$id)
    {
        $reserve = Reserve::find($id);

        $reserve->delete();
        return view('user_reserve_delete_complete');
    }
    
    // ?????????????????????????????????
    public function gymCreate()
    {
        return view('gym_create');
    }

    // ?????????????????????????????????
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

    // ???????????????????????????
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

        return view('gym_create_info_time',[
        'terms' => config('const.term'),
        'id' => $info,
        ]);
    }

    
    // ???????????????????????????????????????
    public function completeTime(Request $request, $id)
    {

        $time = new Time;

        $columns = ['term_1','term_2', 'term_3', 'term_4', 'term_5', 'term_6', 'term_7', 'term_8', 'term_9', 'term_10', 'term_11', 'term_12', 'term_13', ];
        foreach($columns as $column){
        $time->$column = $request->$column;
        }

        $time->save(); 

        $info_id = $time->id;
        
        $information = DB::table('informations')
                            ->where('id', '=', $id)
                            ->update([
                                'time_id' => $info_id
                                ]);

        // $user = Auth::id();

        // $info = new Information;

        // $columns = ['event_id','time_id','name', 'prif','city','adress','station',  'access','tel', 'holiday', 'start_time','end_time','price','lat','lng','check_id',];
        // foreach($columns as $column){
        //     $info->$column = $request->$column;
        // }

        // $info->save();

        // $info->user()->attach($user);

        return view('gym_create_complete',[
        ]);
    }




    // ???????????????????????????
    public function gymHome()
    {
        return view('gym_home');
    }

    // ????????????????????????????????????????????????????????????
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

    public function adminGymList()
    {
        $all = Information::where('check_id', '=', 0)
                            ->get()
                            ->toArray();

        return view('admin_gym_list',[
            'admin' => $all,
        ]);
    }

    public function adminGymDetail($id)
    {
        $all = Information::where('id', '=', $id)
                            ->get()
                            ->toArray();

        return view('admin_gym_detail',[
            'info' => $all,
        ]);
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

    // ???????????????????????????
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

        // ??????????????????????????????
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
        //??????????????????????????????????????? 
        public function gymCarender($id)
        {
    
            $all = Information::where('id', '=', $id)
                                ->first();
    
            return view('gym_carender',[
                'info' => $all,
            ]);
        }
        // ???????????????????????????
        public function gymReserve(Request $request,$id)
        {
            $date = $request['date'];
            $event = Event::where('information_id', '=', $id)
                            ->first();
              
            if($event->date == $date){
                return view('cannot_reserve',[
                    'date' => $date,
                    'event' => $event
                ]);
            }else{   
                $all = Information::join('times', 'times.id', '=', 'informations.time_id')
                                    ->join('reserves', 'reserves.information_id', '=', 'informations.id')
                                    ->select('informations.id', 'reserves.term')
                                    ->where('informations.id', '=', $id)
                                    ->where('reserves.date', 'like', '%'.$date.'%')
                                    ->get()
                                    ->toArray(); 
                $reserveTerm = [];
                foreach($all as $t){
                array_push($reserveTerm, $t['term']);
                }          

                $term_info = Information::join('times', 'times.id', '=', 'informations.time_id')
                    ->where('informations.id', '=', $id)
                    ->first();

                return view('gym_reserve_list',[
                'info' => $reserveTerm,
                'terms' => config('const.term'),
                'date' => $date,
                'id' => $id,
                'term_info' => $term_info,
                ]);
            }
        }

        // ?????????????????????????????????
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

        //??????????????????????????????????????????
        public function gymMypage()
        {
            $reserve = Reserve::where('user_id', '=', \Auth::user()->id)
                                ->get();

            $information= Information::join('reserves', 'reserves.information_id', '=', 'informations.id')
                                        ->where('reserves.user_id', '=', \Auth::user()->id)
                                        ->select('informations.name')
                                        ->first();       

            return view('gym_mypage',[
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

            $event = Event::where('information_id', '=', $id)
                                ->first();
    
            if($event->date == $date){
                return view('cannot_reserve',[
                    'date' => $date,
                    'event' => $event
                ]);
            }else{
                $all = Information::join('times', 'times.id', '=', 'informations.time_id')
                                    ->join('reserves', 'reserves.information_id', '=', 'informations.id')
                                    ->select('informations.id', 'reserves.term')
                                    ->where('informations.id', '=', $id)
                                    ->where('reserves.date', 'like', '%'.$date.'%')
                                    ->get()
                                    ->toArray(); 
                $reserveTerm = [];
                foreach($all as $t){
                    array_push($reserveTerm, $t['term']);
                }
                $term_info = Information::join('times', 'times.id', '=', 'informations.time_id')
                ->where('informations.id', '=', $id)
                ->first();
                                                    
                // $reserve = Reserve::where('information_id', '=', $id)
                //                     ->get()
                //                     ->toArray();
                                    
    // SELECT r.term FROM informations as i JOIN reserves as r ON i.id = r.information_id WHERE i.id = 6 AND date LIKE '%10%';                              
        
                return view('check_reserve_list',[
                    'info' => $reserveTerm,
                    'terms' => config('const.term'),
                    'date' => $date,
                    'id' => $id,
                    'term_info' => $term_info,
                ]);
            } 
        }

        
    // gym????????????????????????????????????????????????
    public function gymReserveDelete($id)
    {

        $reserve = Reserve::join('informations', 'informations.id', '=', 'reserves.information_id')
                            ->where('reserves.id', '=', $id)
                            ->first();                

        return view('gym_reserve_delete',[
            'reservation' => $reserve,
            'reserve_id' => $id,
        ]);
    }
    
    // gym???????????????????????????
    public function gymDeleteComplete(Request $request,$id)
    {
        $reserve = Reserve::find($id);

        $reserve->delete();
        return view('gym_reserve_delete_complete');
    }


    public function gymReserveEdit($id)
    {
        $reserve = Reserve::join('informations', 'informations.id', '=', 'reserves.information_id')
                            ->where('reserves.id', '=', $id)
                            ->first();   
        $user_id = Auth::user()->id;  
        
        return view('gym_reserve_edit',[
        'reservation' => $reserve,
        'reserve_id' => $id,
        'user_id' => $user_id,
        ]);
    }

    public function gymReserveUpdate(Request $request, $id)
    {
        $reserve = new Reserve;
        $record = $reserve->find($id);


        $columns = ['information_id', 'date',  'user_id', 'name', 'tel', 'email', 'member','term'];
        foreach($columns as $column){
            $record->$column = $request->$column;
        }

        $record->save();    

        return view('gym_reserve_edit_complete',[
 
            ]);
    }

// ????????????????????????
    public function openTime($id)
    {
        $all = Information::where('id', '=', $id)
                            ->first();

        $data = Time::join('informations', 'informations.time_id', '=', 'times.id')
                    ->where('informations.id', '=', '$id')
                    ->get();

        return view('open_time',[
            'terms' => config('const.term'),
            'info' => $all,
        ]);
    }

    public function openTimeComplete(Request $request, $id)
    {
        $time = new Time;

        $record = $time->find($id);

        $columns = ['term_1','term_2', 'term_3', 'term_4', 'term_5', 'term_6', 'term_7', 'term_8', 'term_9', 'term_10', 'term_11', 'term_12', 'term_13', ];
        foreach($columns as $column){
            $record->$column = $request->$column;
        }

        $record->save(); 

    
        return view('open_time_complete');
    }



    // ??????????????????
    public function infoEdit($id)
    {
        $information = Information::where('id', '=', $id)
                                    ->get()
                                    ->toArray();

        return view('gym_info_edit',[
            'informations' => $information,
        ]);
    }

    // ????????????????????????
    public function infoEditComplete(Request $request, $id)
    {
        $info = new Information;

        $record = $info->find($id);

        $columns = ['event_id','time_id','name', 'prif','city','adress','station', 'access','tel', 'holiday', 'start_time','end_time','price','lat','lng','check_id',];
        foreach($columns as $column){
            $record->$column = $request->$column;
        }

        $record->save();
    
        return view('gym_info_edit_complete');
    }

        // ??????????????????
        public function addImage($id)
        {
            $information = Information::where('id', '=', $id)
                                        ->first();
            return view('add_image',[
                'informations' => $information,
            ]);
        }

        public function upload(Request $request,$id)
        {
            // ?????????????????????
            $dir = 'sample';  
            // ???????????????????????????????????????????????????
            $file_name = $request->file('image')->getClientOriginalName();

            // ????????????????????????????????????
            $request->file('image')->storeAs('public/' . $dir, $file_name);

            // ?????????????????????DB?????????
            $image = new Image();
            $image->information_id = $id;
            $image->name = $file_name;
            $image->path = 'storage/' . $dir . '/' . $file_name;
            $image->save();

            return view('add_image_complete');
        }



    public function googleMap($id)
    {
        $info = Information::find($id);

        return view('google_map',[
            'info' => $info,
        ]);
    }

    



}
