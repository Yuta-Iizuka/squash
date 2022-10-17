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
// 全ユーザー

    Route::get('/gym/create', [ReservationController::class, 'gymCreate'])->name('gym.create');
    // Route::post('/new/gym/create', [RegisterController::class, 'newGymCreate'])->name('new.gym.create');
    Route::post('/new/gym/create/info', [ReservationController::class, 'infoNewGymCreate'])->name('info.new.gym.create');

    Route::resource('reserve', 'ReservationController');
Route::group(['middleware' => 'auth'], function(){

// ユーザー
    Route::group(['middleware' => 'auth','can:user-higher'], function(){
        Route::get('/' ,[ReservationController::class, 'index']);

        Route::resource('reserve', 'ReservationController');
        
        Route::get('/gym/{id}/show', [ReservationController::class, 'show'])->name('gym.show');
    
        Route::get('/gym/{id}/carender', [ReservationController::class, 'carender'])->name('gym.carender');
    
        Route::post('/gym/{id}/reserve', [ReservationController::class, 'reserve'])->name('gym.reserve');
        Route::get('/user/{userId}/reserve/{infoId}/{date}/{term}', [ReservationController::class, 'createUserReserve'])->name('reserve.create.user');
    
        Route::get('/user/mypage' ,[ReservationController::class, 'userMypage'])->name('user.mypage');
        Route::get('/reserve/{id}/delete' ,[ReservationController::class, 'reserveDelete'])->name('reserve.delete');
    
        Route::post('/delete/{id}/complete' ,[ReservationController::class, 'deleteComplete'])->name('delete.complete');
    });

    Route::group(['middleware' => 'auth','can:admin-higher'], function(){
        Route::get('/gym/home' ,[ReservationController::class, 'gymHome'])->name('gym.home');
    });
    

    Route::group(['middleware' => 'auth','can:system-only'], function(){

    });

});
   
