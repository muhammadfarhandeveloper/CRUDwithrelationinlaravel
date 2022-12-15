<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/student',[StudentController::class , 'index']);
Route::get('/student/insert',[StudentController::class , 'insert']);
Route::post('/student/store',[StudentController::class , 'store']);
Route::get('/student/edit/{id}',[StudentController::class , 'edit']);
Route::get('/student/delete/{id}',[StudentController::class , 'delete']);
Route::post('/student/update/{id}',[StudentController::class , 'update']);

    

Route::group(['prefix' => 'department'],function(){
    
Route::get('/',[DepartmentController::class , 'index']);
Route::get('//insert',[DepartmentController::class , 'insert']);
Route::post('//store',[DepartmentController::class , 'store']);
Route::get('/edit/{id}',[DepartmentController::class , 'edit']);
Route::get('/trashdata',[DepartmentController::class , 'trashdata']);
Route::get('/delete/{id}',[DepartmentController::class , 'delete']);
Route::get('/deleteper/{id}',[DepartmentController::class , 'deleteper']);
Route::get('/restore/{id}',[DepartmentController::class , 'restore']);
Route::post('/update/{id}',[DepartmentController::class , 'update']);

});


Route::get('/employee',[EmployeeController::class , 'index']);
Route::get('/employee/insert',[EmployeeController::class , 'insert']);
Route::post('/employee/store',[EmployeeController::class , 'store']);
Route::get('/employee/edit/{id}',[EmployeeController::class , 'edit']);
Route::get('/employee/delete/{id}',[EmployeeController::class , 'delete']);
Route::post('/employee/update/{id}',[EmployeeController::class , 'update']);



// Route::get('getsession',[Session::class , 'getsession']);

Route::get('/getsession',function(){


    echo "<pre>";
    print_r(session()->all());
});

Route::get('/setsession',function(){

    session()->flash('status','data storted in form');
    
    
    session()->put('email','farhan@gmail.com');

    session(['name' => 'farhan' , 'gender' => 'male']);

});

Route::get('delsession',function(){

    // session()->forget('gender');
    session()->flush();

    return redirect('/getsession');

});






