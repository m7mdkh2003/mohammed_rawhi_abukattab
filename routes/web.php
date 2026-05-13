<?php

use Illuminate\Support\Facades\Route;

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