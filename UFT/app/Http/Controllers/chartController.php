<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Charts;
use App\User;
use DB;

class chartController extends Controller
{
    //User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
     public function index()
    {
    	/*$users = DB::table('treasury')
                    ->pluck('amount');
                   dd($users);
                 //   foreach($users as $user){
        $chart = Charts::database($users, 'line', 'highcharts')
			      ->title("Funding per month and per period")
			      ->elementLabel("Per months")
			      ->dimensions(1000, 500)
                  ->responsive(false)
			      ->groupByMonth(date('Y'), true);
        return view('chart',compact('chart'));


*/




$users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($users, 'line', 'highcharts')
			      ->title("Funding per month and per period")
			      ->elementLabel("Per months")
			      ->dimensions(1000, 500)
                  ->responsive(false)
			      ->groupByMonth(date('Y'), true);
        return view('chart',compact('chart'));









    }
}
