<?php

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

Route::get('/', [
'as'=>'/',
  'uses'=>'todoController@show'
]);

Route::get('/taskdetails',[
  'as'=>'/',
  'uses'=>'todoController@addtask'
  ]);


Route::post('/subtaskdetails',[
  'as'=>'subtaskdetails',
  'uses'=>'todoController@addtaskdetail'
  ]);

Route::get('/completedtaskdetails',[
  'as'=>'completedtaskdetails',
  'uses'=>'todoController@completedtask'
  ]);

Route::post('/subtasksubmit',[
  'as'=>'subtasksubmit',
  'uses'=>'todoController@addsubtasksubmit'
  ]);

Route::get('details/{id}','todoController@taskdetails');

Route::post('/tasknamesearch',[
  'as'=>'/',
  'uses'=>'todoController@addtasksearch'
  ]);





