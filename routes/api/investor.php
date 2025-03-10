<?php


use App\Http\Controllers\PassportAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});



Route::post('investor/register', [PassportAuthController::class, 'registerInvestor'])->name('registerInvestor');
Route::post('investor/login', [PassportAuthController::class, 'LoginInvestor'])->name('LoginInvestor');

Route::group( ['prefix' =>'investor','middleware' => ['auth:investor-api','scopes:investor'] ],function(){
   // authenticated staff routes here

//    Route::get('dashboard',[PassportAuthController::class, 'userDashboard']);
    Route::get('logout',[PassportAuthController::class,'LogoutInvestor'])->name('LogoutInvestor');



//Project
Route::prefix("projects")->group(function (){
  Route::get('/',[\App\Http\Controllers\ProjectController::class,'index']);
  Route::get('/{id}',[\App\Http\Controllers\ProjectController::class,'show']);
});



//Complaint
Route::prefix("complaints")->group(function (){

  Route::post('/',[\App\Http\Controllers\ComplaintController::class,'store']);
  Route::post('update/{id}',[\App\Http\Controllers\ComplaintController::class,'update']);
  Route::post('delete/{id}',[\App\Http\Controllers\ComplaintController::class,'destroy']);
});



//Investor
Route::prefix("investors")->group(function (){
    Route::post('update/{id}',[\App\Http\Controllers\InvestorController::class,'update']);
});




});




