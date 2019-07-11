<?php
use App\Http\Controllers\MemberController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');

/*Route::get('/test',function(){
    return view('test/index');
});
*/
Route::get('/test','TestController@show');
Route::get('/members/text','MemberController@rectext');

Route::resource('agents', 'AgentController');

Route::resource('treasuries', 'TreasuryController');

Route::resource('districts', 'DistrictController');

Route::resource('payments', 'PaymentController');

Route::resource('members', 'MemberController');

Route::resource('dashboard', 'DashboardController');

Route::resource('administrators', 'AdministratorController');
