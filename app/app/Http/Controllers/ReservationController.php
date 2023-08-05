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
use App\Services\UserService;
use App\Services\GymInformationService;
use App\Services\ReserveService;
use App\Services\ImageService;
use App\Services\EventService;
use App\Services\TimeService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;
    protected $GymInformationService;
    protected $ReserveService;
    protected $ImageService;
    protected $EventService;
    protected $TimeService;


    public function __construct(
        UserService $userService,
        GymInformationService $GymInformationService,
        ReserveService $ReserveService,
        ImageService $ImageService,
        EventService $EventService,
        TimeService $TimeService
    )
    {
        $this->userService = $userService;
        $this->GymInformationService = $GymInformationService;
        $this->ReserveService = $ReserveService;
        $this->ImageService = $ImageService;
        $this->EventService = $EventService;
        $this->TimeService = $TimeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // ログインユーザーのID
        $id = $this->userService->getUserId();
        $users = $this->userService->getUser();
        $information = $this->GymInformationService->getGymInformation();

        foreach($users as $user){
            // ログインが施設の時
            if($user->division == 1)
            {
                if(empty($user->info[0]->id))
                {
                    return view('gym_create_info');
                }else{
                    $id = $user->info[0];
                    return view('gym_home',[
                        'informations' => $id,
                    ]);
                }
            // ログインが全体の管理者の時
            }else if($user->division == 2){
                $allInfo = $information
                        ->where('check_id', '=', 1)
                        ->get()
                        ->toArray();

                return view('admin_home',[
                    'admin' => $allInfo,
                ]);
            //ログインがユーザーの時
            }else{
                // 管理者が許可した施設のみ表示
                $check_info = $this->GymInformationService->getCheckInfo($information);
                $keyword = $request->input('keyword');
                if (!empty($keyword)) {
                    $check_info = $this->GymInformationService->getSearchInfo($keyword);
                }

                return view('user_home',[
                    'informations' => $check_info,
                    'keyword' => $keyword,
                ]);
            }
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
    // 予約を保存する
    public function store(Request $request)
    {
        $this->ReserveService->userReserve($request);

        return view('user_reserve_complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 施設の詳細ページ
    public function show($id)
    {
        $gymInformationId = $this->GymInformationService->getGymInformationId($id);
        $image =$this->ImageService->getImage($id);

        return view('gym_detail',[
            'info' => $gymInformationId,
            'image' => $image,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 予約の編集ページへ
    public function edit($id)
    {
        $reserve = $this->ReserveService->getReserveInfo($id);
        $user_id = $this->userService->getUserId();

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
        $this->ReserveService->userReserveUpdate($request,$id);

        return view('reserve_edit_complete');
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
    // ユーザー予約時のカレンダー表示
    public function carender($id)
    {
        $gymInformationId = $this->GymInformationService->getGymInformationId($id);

        return view('user_carender',[
            'info' => $gymInformationId,
            'id'=> $id,
        ]);
    }



    public function reserve(CreateData $request,$id)
    {
        $date = $request['date'];
        $event = $this->EventService->getEvent($id);

        // 施設がイベントで休日の場合
        if($event->date == $date){
            return view('cannot_reserve',[
                'date' => $date,
                'event' => $event
            ]);
        }else{
            $openTime = $this->GymInformationService->getOpenTime($id,$date);
            $reserveTerm = $this->ReserveService->reserveTerm($openTime);
            $term_info =  $this->GymInformationService->getTermInfo($id);

            return response()->json([
                'form' => view('user_reserve_list',[
                    'info' => $reserveTerm,
                    'terms' => config('const.term'),
                    'date' => $date,
                    'id' => $id,
                    'term_info' => $term_info,
                ])->render()
            ]);
        }
    }


    public function createUserReserve($userId, $id, $date, $term )
    {
        $user = $this->userService->getUserId();
        $info = $this->GymInformationService->getGymInformationId($id);
        $config_term = config('const.term');

        return view('user_reserve_registration',[
            'infos' => $info,
            'userId' => $userId,
            'term' => $config_term[$term],
            'user' => $user,
            'date' => $date,
        ]);
    }

// ユーザーのマイページ（キャンセルできるところ）
    public function userMypage()
    {
        $day=Carbon::yesterday();
        $reserve = $this->ReserveService->getMypageReserve($day);

        return view('user_mypage',[
            'reservation' => $reserve,
        ]);
    }

    // ユーザーのマイページ→キャンセル確認へ
    public function reserveDelete($id)
    {
        $reserve = $this->ReserveService->getReserveInfo($id);

        return view('user_reserve_delete',[
            'reservation' => $reserve,
            'reserve_id' => $id,
        ]);
    }

    // キャンセル実施
    public function deleteComplete($id)
    {
        $this->ReserveService->reserveDelete($id);

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
        $this->userService->newGymCreate($request);

        return view('gym_create_info');
    }

    // 施設情報の新規登録
    public function infoNewGymCreate(Request $request)
    {
        $user = $this->userService->getGymId();
        $info = $this->GymInformationService->newInfoCreate($user,$request);

        return view('gym_create_info_time',[
            'terms' => config('const.term'),
            'id' => $info,
        ]);
    }


    // 施設情報の営業時間新規登録
    public function completeTime(Request $request, $id)
    {
        $this->TimeService->newTimeCreate($request,$id);

        return view('gym_create_complete',[
        ]);
    }




    // 施設管理者のホーム
    public function gymHome()
    {
        return view('gym_home');
    }

    // 施設管理者のホーム→施設オーダーの詳細へ
    public function adminGymOrder($id)
    {
        $gymInformationId = $this->GymInformationService->getGymInformationId($id);

        return view('admin_gym_order',[
            'admin' => $gymInformationId,
        ]);
    }

    public function adminGymOrderComplete(Request $request,$id)
    {
        $this->GymInformationService->gymApproval($id);

        return view('admin_gym_order_complete');
    }

    public function adminGymList()
    {
        $getAllGymInfo =$this->GymInformationService->getAllGymInfo();

        return view('admin_gym_list',[
            'admin' => $getAllGymInfo,
        ]);
    }

    public function adminGymDetail($id)
    {
        $gymInformationId =$this->GymInformationService->getGymInformationId($id);

        return view('admin_gym_detail',[
            'info' => $gymInformationId,
        ]);
    }


    public function eventCreate()
    {
        $user = $this->userService->getUserId();
        $id = $this->EventService->getEventId($user);
        $information = $this->GymInformationService->getGymInformation();
        return view('event_create',[
            'id' => $id,
            'info' => $information,
        ]);
    }

    public function eventCreateComplete(Request $request)
    {
       $this->EventService->eventCreate($request);

        return view('event_create_complete');
    }

    // イベント編集トップ
    public function eventList()
    {
        $user = $this->userService->getUserId();
        $id = $this->EventService->getEventId($user);
        $event = $this->EventService->getEventList($id);

        return view('event_list',[
            'events' => $event,
        ]);
    }

        // イベント編集ページへ
        public function eventEdit($id)
        {
            $event =$this->EventService->getEventEdit($id);

             return view('event_edit',[
                'events' => $event,
            ]);
        }

        public function eventEditComplete(Request $request,$id)
        {
            $this->EventService->eventSave($request,$id);

            return view('event_edit_complete',[
            ]);
        }
        //施設の予約のカレンダー表示
        public function gymCarender($id)
        {
            $gymInformationId = $this->GymInformationService->getGymInformationId($id);

            return view('gym_carender',[
                'info' => $gymInformationId,
            ]);
        }
        // 施設予約の時間表示
        public function gymReserve(Request $request,$id)
        {
            $date = $request['date'];
            $event = $this->EventService->getEvent($id);

            if($event->date == $date){
                return view('cannot_reserve',[
                    'date' => $date,
                    'event' => $event
                ]);
            }else{
                $openTime = $this->GymInformationService->getOpenTime($id,$date);
                $reserveTerm = $this->ReserveService->reserveTerm($openTime);
                $term_info =  $this->GymInformationService->getTermInfo($id);

                return response()->json([
                    'form' => view('gym_reserve_list',[
                        'info' => $reserveTerm,
                        'terms' => config('const.term'),
                        'date' => $date,
                        'id' => $id,
                        'term_info' => $term_info,
                    ])->render()
                ]);
            }
        }

        // 施設の予約確認ページへ
        public function createGymReserve($userId, $id, $date, $term )
        {
            $user = $this->userService->getUserId();
            $info = $this->GymInformationService->getGymInformationId($id);
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
            $this->ReserveService->userReserve($request);

            return view('gym_reserve_complete');
        }

        //施設の人が自分で予約したもの
        public function gymReserveList()
        {
            $reserve = $this->ReserveService->getReserveList();
            $information = $this->GymInformationService->getGymInformationList();

            return view('gym_reserve_list_schedule',[
                'reservation' => $reserve,
                'info' => $information,
            ]);
        }

        public function checkCarender($id)
        {
            $gymInformationId = $this->GymInformationService->getGymInformationId($id);

            return view('check_carender',[
                'info' => $gymInformationId,
            ]);
        }

        public function checkReserve(Request $request,$id)
        {
            $date = $request['date'];
            $event = $this->EventService->getEvent($id);

            if($event->date == $date){
                return view('cannot_reserve',[
                    'date' => $date,
                    'event' => $event
                ]);
            }else{
                $openTime = $this->GymInformationService->getOpenTime($id,$date);
                $reserveTerm = $this->ReserveService->reserveTerm($openTime);
                $term_info =  $this->GymInformationService->getTermInfo($id);

                return response()->json([
                    'form' => view('check_reserve_list',[
                        'info' => $reserveTerm,
                        'terms' => config('const.term'),
                        'date' => $date,
                        'id' => $id,
                        'term_info' => $term_info,
                    ])->render()
                ]);
            }
        }


    // gym側のマイページ→キャンセル確認へ
    public function gymReserveDelete($id)
    {
        $reserve = $this->ReserveService->getReserveInfo($id);

        return view('gym_reserve_delete',[
            'reservation' => $reserve,
            'reserve_id' => $id,
        ]);
    }

    // gym側のキャンセル実施
    public function gymDeleteComplete($id)
    {
       $this->ReserveService->reserveDelete($id);

        return view('gym_reserve_delete_complete');
    }


    public function gymReserveEdit($id)
    {
        $reserve = $this->ReserveService->getReserveInfo($id);
        $user_id = $this->userService->getUserId()->id;

        return view('gym_reserve_edit',[
        'reservation' => $reserve,
        'reserve_id' => $id,
        'user_id' => $user_id,
        ]);
    }

    public function gymReserveUpdate(Request $request, $id)
    {
        $this->ReserveService->userReserveUpdate($request,$id);

        return view('gym_reserve_edit_complete');
    }

// 営業時間ページへ
    public function openTime($id)
    {
        $information = $this->GymInformationService->getGymInformationId($id);

        return view('open_time',[
            'terms' => config('const.term'),
            'info' => $information,
        ]);
    }

    public function openTimeComplete(Request $request, $id)
    {
        $this->TimeService->updateTime($request,$id);

        return view('open_time_complete');
    }



    // 施設情報編集
    public function infoEdit($id)
    {
        $information = $this->GymInformationService->getGymInformationId($id);

        return view('gym_info_edit',[
            'informations' => $information,
        ]);
    }

    // 施設情報編集完了
    public function infoEditComplete(Request $request, $id)
    {

        $this->GymInformationService->editInformation($request,$id);

        return view('gym_info_edit_complete');
    }

    // 施設画像追加ページ
    public function addImage($id)
    {
        $information = $this->GymInformationService->getGymInformationId($id);
        $image = $this->ImageService->getImage($id);

        return view('add_image',[
            'informations' => $information,
            'image' => $image,
        ]);
    }

        // 施設画像処理
    public function upload(Request $request,$id)
    {
        $this->ImageService->saveImage($request,$id);

        return back()->withInput();
    }

    public function delete($id, $infoId)
    {
        $this->ImageService->deleteImage($id);

        $information = $this->GymInformationService->getGymInformationId($infoId);
        $image = $this->ImageService->getImage($infoId);

        return view('add_image',[
            'informations' => $information,
            'image' => $image,
        ])->with('message', '削除完了しました。');
    }

    public function googleMap($id)
    {
        $info = $this->GymInformationService->googleInfoId($id);

        return view('google_map',[
            'info' => $info,
        ]);
    }

}
