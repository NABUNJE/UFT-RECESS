<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Charts;
use App\User;
use DB;
use App\Models\Treasury;
use App\Models\Member;
class chartController extends Controller
{
    //
     public function index()
    {
       /* $perc = Member::select(
            \ DB::raw("DATE_FORMAT(created_at,'%M %Y') as month"),
             \DB::raw("COALESCE((LAG (total,1) OVER (PARTITION BY month ORDER BY months DESC)-total)/total) Percent_Change")
        )  ->get();
        $chart1 = Charts::database($perc, 'bar', 'highcharts')
			      ->title("Funding per month and per period")
			      ->elementLabel("Per months")
			      ->dimensions(1000, 500)
                  ->responsive(false)
			      ->groupByMonth(date('Y'), true);
        //return view('chart',compact('chart'));

*/
//$users= DB::table('treasury')->pluck('amount')->get();
//treasury::where(\DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'),
    				//(\DB::raw("amount")))
$users = treasury::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart= Charts::database($users, 'bar', 'highcharts')
			      ->title("Funding per month and per period")
			      ->elementLabel("Per months")
			      ->dimensions(1000, 500)
                  ->responsive(false)
			      ->groupByMonth(date('Y'), true);
        return view('chart',compact('chart'));










    }
}
