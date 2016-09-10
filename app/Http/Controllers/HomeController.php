<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\CallController;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
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
     * @return Response
     */
    public function index()
    {
      	$call = new CallController();
      	$aveLen = $call->getAverageCallLength();
      	$negative =DB::table('calls')
          ->where("opinion","Negative")
          ->count();
      	$positive =DB::table('calls')
          ->where("opinion","Positive")
          ->count();
      	$neutral =DB::table('calls')
          ->where("opinion","Neutral")
          ->count();
      	$pickupCount = DB::table('calls')
          ->where('pickup',true)
          ->count();
      	$total = DB::table('calls')
          ->count();

        $volunteers = DB::table('volunteers')
          ->count();
        return view('home',
          [
            'negative'=>$negative,
            'positive'=>$positive,
            'neutral'=>$neutral,
            'pickup'=>$pickupCount,
            'total'=>$total,
            'aveLen'=>$aveLen,
            'volunteerCount' => $volunteers
          ]
      );
    }
}
