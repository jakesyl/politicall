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
            'volunteerCount' => $volunteers,
            'scatterData' => $this->getScatterData()
          ]
      );
    }

    protected function getScatterData(){
      $callFunctions = new CallController();

      $calls = DB::Table('calls')
        ->get();

      $data = [
          'Neutral' => array(),
          'Positive' => array(),
          'Negative' => array()
      ];

      foreach($calls as $call){
         $duration = round($callFunctions->getSecondsInCall($call->duration));
         $hourOfDay = (int) date_format(new \DateTime($call->created_at), "H");
         $coordinates = [$hourOfDay, $duration];
         if($call->opinion=='Neutral'){
           array_push($data['Neutral'], $coordinates);
         }else if($call->opinion == 'Positive'){
           array_push($data['Positive'], $coordinates);
         }else{
           array_push($data['Negative'], $coordinates);
         }
      }

      return (object) $data;

    }
    function getListOfContacts(){
	$contacts=DB::table('contacts')->get();
	$moods=array();
	$names=array();
	$c = 0;
	foreach($contacts as $contact){
		if(DB::table('calls')->where('phone',$contact->phone)->count() !=0){
		$mood= DB::table('calls')->where('phone',$contact->phone)->orderBy('id', 'DESC')->first()->opinion;
		$name= DB::table('calls')->where('phone',$contact->phone)->orderBy('id', 'DESC')->first()->name;
		}
		else{
		$mood="unknown";
		$name="unkown";
		}
		$moods[$c]=$mood;
		$names[$c]=$name;
		$c++;
	
	}
	return view('contacts',['contacts'=>$contacts,'names'=>$names, 'opinions'=>$moods]);
    }

}
