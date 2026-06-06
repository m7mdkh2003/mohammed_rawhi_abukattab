<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get(uri: '/', action: function (){
    return view(view: 'welcome');
});

Route::get(uri: '/about', action: function () {
    $name = 'Diaa';

    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];


    //return view('about', ['name' => $name]);
    // return view('about')->with('name', $name);
    return view(view: 'about', data: compact( 'name', 'departments' ));
});


Route::post(uri: '/about', action: function(){
    $name = $_POST['name'];
    $departments = [
        '1' => 'aas',
        '2' => 'css',
        '3' => 'dss'
    ];

    return view(view: 'about', data: compact( 'name',  'departments'));
});

Route::get('tasks',[TaskController::class,'index'] );

Route::post('create',[TaskController::class,'create']);

Route::post('delete/{id}',[TaskController::class,'destroy'] );

Route::get('/edit/{id}', [TaskController::class, 'edit']);

Route::post('update',[TaskController::class,'update']);

Route::get('app',function(){
    return view('layouts.app');

});
Route::get('users',[UserController::class,'index']);

Route::post('user/create',[UserController::class,'create']);

Route::post('user/delete/{id}',[UserController::class,'destroy']);

Route::post('user/edit/{id}',[UserController::class,'edit']);

Route::post('user/update',[UserController::class,'update']);
