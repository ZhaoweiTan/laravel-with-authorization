<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;



class PaperController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
    }

    public function allvenue()
    {
      $venues = DB::table('papers')->select('abbreviation')->distinct()->get();
      return view('results.allvenue',['venues' => $venues]);
    }

    public function venue()
    {
        $v = Input::get('v');
        $paperInVenue = DB::table('papers')->where('abbreviation', $v)->get();
        return view('results.venue',['paperInVenue' => $paperInVenue]);
    }

    public function paper()
    {
        $ID = Input::get('ID');
        $paperInfo = DB::table('papers')->where('ID', $ID)->get();
        return view('results.paper',['paperInfo' => $paperInfo]);
    }

    public function keyword()
    {
        $k = Input::get('q');
        $o = Input::get('o');
        $papers = DB::select(DB::raw("SELECT * FROM `papers` WHERE `topic` LIKE '%".$k."%' OR `title` LIKE '%".$k."%' ORDER BY $o DESC"));
        return view('results.keyword',['papers' => $papers]);
    }
}
