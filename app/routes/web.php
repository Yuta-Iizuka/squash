<?php
use App\Http\Controllers\ReservationController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


// 全ユーザー
    Route::get('/gym/create', [ReservationController::class, 'gymCreate'])->name('gym.create');
    Route::post('/new/gym/create/info', [ReservationController::class, 'infoNewGymCreate'])->name('info.new.gym.create');
    Route::post('/new/gym/create/info/time', [ReservationController::class, 'infoNewGymCreateTime'])->name('info.new.gym.create.time');
    Route::post('/complete/{id}/time', [ReservationController::class, 'completeTime'])->name('complete.time');
    Route::resource('reserve', 'ReservationController');
    Route::group(['middleware' => 'auth'], function(){

// ユーザー

        Route::get('/' ,[ReservationController::class, 'index'])->name('index');

        Route::resource('reserve', 'ReservationController');

        Route::get('/gym/{id}/show', [ReservationController::class, 'show'])->name('gym.show');

        Route::get('/user/{id}/carender', [ReservationController::class, 'carender'])->name('user.carender');
        Route::get('/welcome', [ReservationController::class, 'welcome'])->name('welcome');

        // 予約時間を決定するページ
        Route::post('/user/{id}/reserve', [ReservationController::class, 'reserve'])->name('user.reserve');
        Route::get('/user/{userId}/reserve/{id}/{date}/{term}', [ReservationController::class, 'createUserReserve'])->name('reserve.create.user');

        // マイページ
        Route::get('/user/mypage' ,[ReservationController::class, 'userMypage'])->name('user.mypage');
        Route::get('/reserve/{id}/delete' ,[ReservationController::class, 'reserveDelete'])->name('reserve.delete');
        Route::post('/delete/{id}/complete' ,[ReservationController::class, 'deleteComplete'])->name('delete.complete');

        // 編集
        Route::get('/reserve/{id}/edit' ,[ReservationController::class, 'edit'])->name('reserve.edit');
        Route::post('/reserve/{id}/edit/complete' ,[ReservationController::class, 'update'])->name('reserve.edit.complete');

        Route::get('/gym/home' ,[ReservationController::class, 'gymHome'])->name('gym.home');


        // 管理者ページ
        Route::get('/admin/{id}/gym/order' ,[ReservationController::class, 'adminGymOrder'])->name('admin.gym.order');
        Route::post('/admin/{id}/gym/order/complete' ,[ReservationController::class, 'adminGymOrderComplete'])->name('admin.gym.order.complete');

        Route::get('/admin/gym/list' ,[ReservationController::class, 'adminGymList'])->name('admin.gym.list');
        Route::get('/admin/{id}/gym/detail' ,[ReservationController::class, 'adminGymDetail'])->name('admin.gym.detail');


        // 施設側イベント登録
        Route::get('/event/create', [ReservationController::class, 'eventCreate'])->name('event.create');
        Route::post('/event/create/complete', [ReservationController::class, 'eventCreateComplete'])->name('event.create.complete');

        // 施設側イベント編集
        Route::get('/event/list', [ReservationController::class, 'eventList'])->name('event.list');
        Route::get('/event/{id}/edit', [ReservationController::class, 'eventEdit'])->name('event.edit');
        Route::post('/event/{id}/edit/complete', [ReservationController::class, 'eventEditComplete'])->name('event.edit.complete');

        // 施設側予約
        Route::get('/gym/{id}/carender', [ReservationController::class, 'gymCarender'])->name('gym.carender');
        Route::post('/gym/{id}/reserve', [ReservationController::class, 'gymReserve'])->name('gym.reserve');
        Route::get('/gym/{userId}/reserve/{id}/{date}/{term}', [ReservationController::class, 'createGymReserve'])->name('reserve.create.gym');
        Route::post('/gym/reserve/complete', [ReservationController::class, 'reserveGymComplete'])->name('reserve.gym.complete');

        // 施設が自分でした予約
        Route::get('/gym/reserve/list' ,[ReservationController::class, 'gymReserveList'])->name('gym.reserve.list');
        Route::get('/check/{id}/carender', [ReservationController::class, 'checkCarender'])->name('check.carender');
        Route::post('/check/{id}/reserve', [ReservationController::class, 'checkReserve'])->name('check.reserve');

        // 施設側の予約キャンセル
        Route::get('/gym/reserve/{id}/delete' ,[ReservationController::class, 'gymReserveDelete'])->name('gym.reserve.delete');
        Route::post('/gym/delete/{id}/complete' ,[ReservationController::class, 'gymDeleteComplete'])->name('gym.delete.complete');

        // 施設側の予約編集
        Route::get('/gym/reserve/{id}/edit' ,[ReservationController::class, 'gymReserveEdit'])->name('gym.reserve.edit');
        Route::post('/gym/reserve/{id}/edit/complete' ,[ReservationController::class, 'gymReserveUpdate'])->name('gym.reserve.edit.complete');

        // 営業時間登録
        Route::get('/open/{id}/time', [ReservationController::class, 'openTime'])->name('open.time');
        Route::post('/open/{id}/time/complete', [ReservationController::class, 'openTimeComplete'])->name('open.time.complete');

        // 施設情報編集
        Route::get('/info/{id}/edit', [ReservationController::class, 'infoEdit'])->name('info.edit');
        Route::post('/info/{id}/edit/complete', [ReservationController::class, 'infoEditComplete'])->name('info.edit.complete');

        // 画像追加
        Route::get('/add/{id}/image', [ReservationController::class, 'addImage'])->name('add.image');


        Route::get('/google/{id}/map', [ReservationController::class, 'googleMap'])->name('google.map');

        // 画像アップロード
        Route::post('/upload/{id}/image', [ReservationController::class, 'upload'])->name('upload.image');
        // 画像の削除
        Route::post('/delete/{id}/{infoId}/image', [ReservationController::class, 'delete'])->name('delete.image');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
