<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TestController extends Controller
{
    public function index(){
       Storage::prepend('help.txt','dfe dfegfdef bfvcidecf bcibdecf');

        return view('test.index');
    }
    public function show(){

        $files = Storage::files('/districts');
        foreach($files as $district){

        $content = Storage::get($district);

        $contents = explode("\n",$content);
            foreach($contents as $arrays){
                $name = explode(" ",$arrays);
                DB::table('members')->updateOrInsert(
                    ['id'=>$name[0],'district'=>$name[1],'recommender'=>$name[2],'agent'=>$name[3]]
                );

            }

        }
        return view('test.index');
    }

}
