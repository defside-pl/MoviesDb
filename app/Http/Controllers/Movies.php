<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MMovies;

class Movies extends Controller
{
  
    public function GetMoviesFromApi(Request $request){
      $data=[];
      for ($i =99901; $i < 99912; $i++) {
        $data[$i] =\L5Imdb::title("$i")->all(); 
     
      }
   
    if (count($data)>0) {  DB::table('movies')->insert($data);   }

   $data='OK. Movies in database! Redirecting, please wait...';
   return response($data)->header("Refresh", "3;url=/");

    }

    public function ClearAllMovies()
    {
         DB::table('movies')->delete();
         $data='OK. DB table is clear! Redirecting, please wait...';
         return response($data)->header("Refresh", "3;url=/");   
    }

    public function ShowAllMovies()
    {
        $data="Movies:";
        $allmovies = DB::table('movies')->get();
        return view('welcome', compact('allmovies','data'));    
    }

}
