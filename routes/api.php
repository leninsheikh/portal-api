<?php

use Illuminate\Http\Request;


Route::post('login', 'AuthController@login')->name('login');
Route::post('register', 'AuthController@signup');

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');
    Route::group(['middleware' => ['role:student']], function () {
        Route::get('per', function () {
            return 'ok';
        });
    });

});



use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


Route::get('rp', function () {
//    $role = Role::create(['name' => 'student']);
//    $role = Role::create(['name' => 'teacher']);
//    $permission = Permission::create(['name' => 'student_basic']);
//    $permission = Permission::create(['name' => 'teacher_basic']);
//    return Role::all();
    App\User::find(2)->assignRole('teacher');
    return 'gg';
});


