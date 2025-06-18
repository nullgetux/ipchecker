<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IpController;

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

Route::get('/', [IpController::class, 'index']);

Route::get('/ip', function (Request $request) {
    $ip = $request->ip();
    $userAgent = $request->userAgent();

    if ($request->wantsJson() || $request->is('api/*')) {
        return response()->json([
            'ip' => $ip,
            'user_agent' => $userAgent
        ]);
    }
});
