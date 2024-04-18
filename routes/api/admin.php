<?php


use App\Http\Controllers\PassportAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('admin/login',[\App\Http\Controllers\PassportAuthController::class,'adminLogin'])->name('adminLogin');

Route::group( ['prefix' => 'admin','middleware' => ['auth:admin-api','scopes:admin'] ],function(){
   // authenticated staff routes here
    //Route::get('dashboard',[PassportAuthController::class,'adminDashboard']);
    Route::get('logout',[PassportAuthController::class,'adminlogout'])->name('adminLogout');
    Route::post('delete/{id}', [\App\Http\Controllers\PassportAuthController::class, 'destroy']);


        //Project
        Route::prefix("projects")->group(function (){

            Route::get('/',[\App\Http\Controllers\ProjectController::class,'index']);
            Route::get('/{id}',[\App\Http\Controllers\ProjectController::class,'show']);
            Route::post('delete/{id}',[\App\Http\Controllers\ProjectController::class,'destroy']);
            
        });



        //Complaint
        Route::prefix("complaints")->group(function (){

            Route::get('/',[\App\Http\Controllers\ComplaintController::class,'index']);
            Route::get('/{id}',[\App\Http\Controllers\ComplaintController::class,'show']);
            Route::post('delete/{id}',[\App\Http\Controllers\ComplaintController::class,'destroy']);
        });



        //Tracking
        Route::prefix("trackings")->group(function (){

            Route::get('/',[\App\Http\Controllers\TrackingController::class,'index']);
            Route::post('/',[\App\Http\Controllers\TrackingController::class,'store']);
            Route::get('/{id}',[\App\Http\Controllers\TrackingController::class,'show']);
            Route::post('update/{id}',[\App\Http\Controllers\TrackingController::class,'update']);
            Route::post('delete/{id}',[\App\Http\Controllers\TrackingController::class,'destroy']);
        });



          //Investor
          Route::prefix("trackings")->group(function (){

            Route::get('/',[\App\Http\Controllers\InvestorController::class,'index']);


            Route::post('/',[\App\Http\Controllers\TrackingController::class,'store']);
            Route::get('/{id}',[\App\Http\Controllers\TrackingController::class,'show']);
            Route::post('update/{id}',[\App\Http\Controllers\TrackingController::class,'update']);
            Route::post('delete/{id}',[\App\Http\Controllers\TrackingController::class,'destroy']);
        });
      

    });
