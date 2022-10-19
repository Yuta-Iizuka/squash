<?php
use App\Http\Controllers\ReservationController;

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

Route::group(['middleware' => 'auth','can:user-higher'], function(){});
Route::group(['middleware' => 'auth','can:admin-higher'], function(){});
Route::group(['middleware' => 'auth','can:system-only'], function(){});

// 全ユーザー
    Route::get('/gym/create', [ReservationController::class, 'gymCreate'])->name('gym.create');
    Route::post('/new/gym/create/info', [ReservationController::class, 'infoNewGymCreate'])->name('info.new.gym.create');

    Route::resource('reserve', 'ReservationController');
Route::group(['middleware' => 'auth'], function(){

// ユーザー

        Route::get('/' ,[ReservationController::class, 'index']);

        Route::resource('reserve', 'ReservationController');
        
        Route::get('/gym/{id}/show', [ReservationController::class, 'show'])->name('gym.show');
    
        Route::get('/gym/{id}/carender', [ReservationController::class, 'carender'])->name('gym.carender');
    
        Route::post('/gym/{id}/reserve', [ReservationController::class, 'reserve'])->name('gym.reserve');
        Route::get('/user/{userId}/reserve/{infoId}/{date}/{term}', [ReservationController::class, 'createUserReserve'])->name('reserve.create.user');
    
        // マイページ
        Route::get('/user/mypage' ,[ReservationController::class, 'userMypage'])->name('user.mypage');
        Route::get('/reserve/{id}/delete' ,[ReservationController::class, 'reserveDelete'])->name('reserve.delete');
        Route::post('/delete/{id}/complete' ,[ReservationController::class, 'deleteComplete'])->name('delete.complete');
        
        // 編集
        Route::get('/reserve/{id}/edit' ,[ReservationController::class, 'edit'])->name('reserve.edit');
        Route::post('/reserve/{id}/edit/complete' ,[ReservationController::class, 'update'])->name('reserve.edit.complete');

        Route::get('/gym/home' ,[ReservationController::class, 'gymHome'])->name('gym.home');
        
        Route::get('/admin/{id}/gym/order' ,[ReservationController::class, 'adminGymOrder'])->name('admin.gym.order');
        Route::post('/admin/{id}/gym/order/complete' ,[ReservationController::class, 'adminGymOrderComplete'])->name('admin.gym.order.complete');

        // 施設側イベント登録
        Route::get('/event/create', [ReservationController::class, 'eventCreate'])->name('event.create');
        Route::post('/event/create/complete', [ReservationController::class, 'eventCreateComplete'])->name('event.create.complete');

        // 施設側イベント編集
        Route::get('/event/list', [ReservationController::class, 'eventList'])->name('event.list');
        Route::get('/event/{id}/edit', [ReservationController::class, 'eventEdit'])->name('event.edit');
        Route::post('/event/{id}/edit/complete', [ReservationController::class, 'eventEditComplete'])->name('event.edit.complete');





});

    // Route::post('/new/gym/create', [RegisterController::class, 'newGymCreate'])->name('new.gym.create');
   
