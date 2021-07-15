<?php

use Illuminate\Http\Request;
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

Route::post('/update/user/password', function (Request $request) {
    $user = \App\Models\User::where('email', $request->email)->first();

    if ($user) {
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->save();
        return response()->json('User Password Updated Successfully');
    }
    return response()->json('User Not Found');

});
