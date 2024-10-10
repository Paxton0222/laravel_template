<?php

use App\Http\Controllers\Api\GroupApiController;
use App\Http\Controllers\Api\PermissionApiController;
use App\Http\Controllers\Api\PermissionGroupApiController;
use App\Http\Controllers\Api\RoleApiController;
use App\Http\Controllers\Api\RolePermissionApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\UserRoleApiController;
use App\Http\Controllers\TaiwanGeoController;
use App\Http\Controllers\WebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::post('/', [UserApiController::class, 'create'])
        ->name('api.users.create')
    ;
});

Route::middleware('auth:web,api')->group(function () {
    // 查看自己是誰
    Route::get('/user', static function (Request $request) {
        return $request->user();
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [UserApiController::class, 'get'])
            ->name('api.users.get')
        ;
        Route::get('/all', [UserApiController::class, 'getPage'])
            ->name('api.users.get.all')
        ;
        Route::post('/', [UserApiController::class, 'create'])
            ->name('api.users.create')
        ;
        Route::put('/', [UserApiController::class, 'update'])
            ->name('api.users.update')
        ;
        Route::delete('/', [UserApiController::class, 'delete'])
            ->name('api.users.delete')
        ;
    });
});
