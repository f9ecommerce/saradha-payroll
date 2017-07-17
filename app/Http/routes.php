<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
    // return view('employees/index');
// });

Route::get('/', 'EmployeeController@index');

Route::get('employees/employee_report', 'EmployeeController@employee_report');

Route::resource("employees","EmployeeController");

Route::get('salaries/delete_current_salaries', 'SalaryController@delete_current_salaries');

Route::resource("salaries","SalaryController");

Route::get('reports/pay_slip', 'ReportController@pay_slip');

Route::post('reports/pay_slip_generate', 'ReportController@pay_slip_generate');
