<?php

use App\Http\Controllers\Student;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/checkImg', 'Controller@checkImg');
// 学生
// 学生打卡页面
Route::get('/student','Controller@clockIn');
// 考勤
Route::post('/listAdd','student@listAdd');
// 考勤查询
Route::get('/list','student@list');
// 教师
// 教师登陆页面
Route::get('/login','Controller@login');
// 
Route::any('/store','Teacher@store');
// 
Route::get('/admin','Teacher@admin');
// 功能
// 编辑
Route::post('/edit','Student@edit');
// 编辑页面
Route::get('/editStudent/{id}','Student@editStudent');
// 删除
Route::get('/del/{id}','Student@del');
// 点名
// 关闭
Route::get('close','Controller@close');
// 清理
Route::post('clear','Student@clear');
//Route::get('/deletemember/{id}','MemberController@deletemember');
