<?php

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

Route::get('tasks', function () {

    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('tasks'));
});

Route::post('create', function () {

    DB::table('tasks')->insert([
        'name' => $_POST['name']
    ]);

    return redirect()->back();
});

Route::post('delete/{id}', function ($id) {

    DB::table('tasks')->where('id', $id)->delete();

    return redirect()->back();
});

Route::post('edit/{id}', function ($id) {

    $task = DB::table('tasks')->where('id', $id)->first();

    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('task', 'tasks'));
});

Route::post('update', function () {

 $id=$_POST['id'];
 DB::table('tasks')->where('id','=',$id)->update(['name' => $_POST['name']]);

    return redirect('tasks');
});