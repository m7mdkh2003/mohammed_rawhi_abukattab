<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'm7md';

    $departments = [
        '1' => 'aas',
        '2' => 'css',
        '3' => 'dss'
    ];

    return view('about', compact('name', 'departments'));
});

Route::post('/about', function () {
    $name = $_POST['name'];

    $departments = [
        '1' => 'aas',
        '2' => 'css',
        '3' => 'dss'
    ];

    return view('about', compact('name', 'departments'));
});
Route::get('/tasks', function () {
    return view('tasks');
});

Route::post('/create', function () {
    $task_name=$_POST['name'];
    DB::table('tasks')->insert(['name'=>$task_name]);
    return view('tasks');
});