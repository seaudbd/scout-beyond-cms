<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Frontend\LoginController;
use \App\Http\Controllers\Frontend\RegistrationController;
use \App\Http\Controllers\Frontend\VerificationController;

use \App\Http\Controllers\Frontend\ForgotPasswordController;

use \App\Http\Controllers\Member\ProfileController;
use \App\Http\Controllers\Member\GameVideoController;
use \App\Http\Controllers\Member\PlayerController;
use \App\Http\Controllers\Member\FavoriteController;
use \App\Http\Controllers\Member\MembershipController;
use \App\Http\Controllers\Member\HelpController;

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

Route::get('storage/link', function () {
    exec(symlink('/home/gscbcom/public_html/cms/engine/storage/app/public', '/home/gscbcom/public_html/cms/storage'));

});

Route::get('cache/clear', function () {
   \Illuminate\Support\Facades\Artisan::call('view:clear');
   \Illuminate\Support\Facades\Artisan::call('cache:clear');
   \Illuminate\Support\Facades\Artisan::call('config:clear');
   return response()->json('Cache and Config Cleared');
});



/////////////////////////////////////////////////////////////////////Frontend//////////////////////////////////////////////////////////////////////////////////////
Route::get('/', function() {
    return redirect('login');
});
Route::get('login', [LoginController::class, 'loadLogin']);
Route::post('authenticate/login', [LoginController::class, 'authenticateLogin']);
Route::get('login/direct', [LoginController::class, 'authenticateDirectLogin']);
Route::get('login/invalid', [LoginController::class, 'invalidLogin']);
Route::get('encrypt/and/decrypt/{string}/{type}', [LoginController::class, 'encryptAndDecrypt']);
Route::get('logout', [LoginController::class, 'logout']);


Route::get('signup', [RegistrationController::class, 'loadRegistration']);
Route::post('register', [RegistrationController::class, 'register']);

Route::get('verify', [VerificationController::class, 'verify']);


Route::get('forgot/password', [ForgotPasswordController::class, 'loadForgotPassword']);
Route::post('forgot/password/send/reset/code', [ForgotPasswordController::class, 'sendResetCode']);
Route::get('password/reset/code/{user_id}', [ForgotPasswordController::class, 'loadPasswordResetCode']);
Route::post('forgot/password/verify/reset/code', [ForgotPasswordController::class, 'verifyResetCode']);
Route::get('reset/password/{user_id}/{password_reset_code}', [ForgotPasswordController::class, 'loadResetPassword']);
Route::post('reset/password', [ForgotPasswordController::class, 'resetPassword']);

/////////////////////////////////////////////////////////////////////Member//////////////////////////////////////////////////////////////////////////////////////////

Route::get('member/profile', [ProfileController::class, 'loadProfile'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/profile/save', [ProfileController::class, 'saveProfile'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/profile/save/profile/photo', [ProfileController::class, 'saveProfilePhoto'])->middleware('redirect.to.dashboard.if.authenticated');

Route::get('member/game/videos', [GameVideoController::class, 'loadGameVideos'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('member/game/videos/get/records/{sort_by}/{search_key}', [GameVideoController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('member/game/videos/{id}', [GameVideoController::class, 'loadGameVideo'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('member/game/videos/get/team/lineup/records', [GameVideoController::class, 'getTeamLineupRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/game/video/add/to/favorite', [GameVideoController::class, 'addToFavorite'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/game/video/remove/from/favorite', [GameVideoController::class, 'removeFromFavorite'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/game/video/control/like/count', [GameVideoController::class, 'controlLikeCount'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/game/video/control/dislike/count', [GameVideoController::class, 'controlDislikeCount'])->middleware('redirect.to.dashboard.if.authenticated');

Route::get('member/players', [PlayerController::class, 'loadPlayers'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('member/players/get/records/{position}/{search_key}', [PlayerController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('member/players/{id}/profile', [PlayerController::class, 'loadPlayerProfile'])->middleware('redirect.to.dashboard.if.authenticated');

Route::post('member/player/send/message', [PlayerController::class, 'sendMessage'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/player/add/to/favorite', [PlayerController::class, 'addToFavorite'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/player/remove/from/favorite', [PlayerController::class, 'removeFromFavorite'])->middleware('redirect.to.dashboard.if.authenticated');

Route::get('member/favorites', [FavoriteController::class, 'loadFavorites'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('member/favorites/get/favorite/records', [FavoriteController::class, 'getFavoriteRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/favorites/remove/from/favorite', [FavoriteController::class, 'removeFromFavorite'])->middleware('redirect.to.dashboard.if.authenticated');

Route::get('member/membership', [MembershipController::class, 'loadMembership'])->middleware('redirect.to.dashboard.if.authenticated');


Route::get('member/help', [HelpController::class, 'loadHelp'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('member/help/send/message', [HelpController::class, 'sendMessage'])->middleware('redirect.to.dashboard.if.authenticated');





//////////////////////////////////////////////////////////Admin/////////////////////////////////////////////////////////////////////////

//Route::get('admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/dashboard', function () {
    return redirect('admin/game/videos');
})->middleware('redirect.to.dashboard.if.authenticated');

Route::get('admin/game/videos', [\App\Http\Controllers\Admin\GameVideoController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/game/videos/get/records/{team_id}/{search_key}/{record_per_page}', [\App\Http\Controllers\Admin\GameVideoController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/game/videos/get/record', [\App\Http\Controllers\Admin\GameVideoController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('admin/game/videos/save/record', [\App\Http\Controllers\Admin\GameVideoController::class, 'saveRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('admin/game/videos/delete/record', [\App\Http\Controllers\Admin\GameVideoController::class, 'deleteRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/game/videos/get/team/players', [\App\Http\Controllers\Admin\GameVideoController::class, 'getTeamPlayers'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/game/videos/{id}', [\App\Http\Controllers\Admin\GameVideoController::class, 'loadGameVideo'])->middleware('redirect.to.dashboard.if.authenticated');


Route::get('admin/players', [\App\Http\Controllers\Admin\PlayerController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/players/get/records/{team_id}/{search_key}/{record_per_page}', [\App\Http\Controllers\Admin\PlayerController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/players/get/record', [\App\Http\Controllers\Admin\PlayerController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('admin/players/save/record', [\App\Http\Controllers\Admin\PlayerController::class, 'saveRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('admin/players/delete/record', [\App\Http\Controllers\Admin\PlayerController::class, 'deleteRecord'])->middleware('redirect.to.dashboard.if.authenticated');

Route::get('admin/teams', [\App\Http\Controllers\Admin\TeamController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/teams/get/records/{search_key}/{record_per_page}', [\App\Http\Controllers\Admin\TeamController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/teams/get/record', [\App\Http\Controllers\Admin\TeamController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('admin/teams/save/record', [\App\Http\Controllers\Admin\TeamController::class, 'saveRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('admin/teams/delete/record', [\App\Http\Controllers\Admin\TeamController::class, 'deleteRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('admin/teams/delete/team/player', [\App\Http\Controllers\Admin\TeamController::class, 'deleteTeamPlayer'])->middleware('redirect.to.dashboard.if.authenticated');




Route::fallback(function () {
    if (auth()->check()) {
        return view('Errors.auth_404');
    } else {
        return view('Errors.404');
    }

});
