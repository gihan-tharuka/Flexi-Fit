<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function (){
    return response()->json([
        'status'=> true,
        'payload'=>([
            'message' => 'hello'
        ]),
        '_time' => time(),]);
});

// Temporary: debug endpoint to inspect cookies/headers sent to API
Route::get('/debug-cookies', function (Request $request) {
    return response()->json([
        'path' => $request->path(),
        'host' => $request->getHost(),
        'cookies' => $request->cookies->all(),
        'headers' => [
            'cookie' => $request->header('cookie'),
            'origin' => $request->header('origin'),
            'referer' => $request->header('referer'),
        ],
        'session_id' => $request->getSession()?->getId(),
    ]);
});
