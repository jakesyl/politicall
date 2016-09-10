<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class CallController extends Controller
{
    /**
    * @author Jake Sylvestre
    * create calls
    */
    public function makeCall(Request $request){
      DB::table('calls')
        ->insert(
          [
            'callerId' => $request->input('id'),
            'duration' => $request->input('duration'),
            'pickup' => $request->input('pickup'),
            'opinion' => $request->input('opinion'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'created_at' => date("Y-m-d H:i:s")
          ]
        );

      DB::table('contacts')
        ->where('phone', $request->input('phone'))
        ->update([
              'toCall' => 1
            ]
          );

    }

    /**
    * @author Jake Sylvestre
    * get list of all calls
    */
    public function getCalls(Request $request){
      $calls =  DB::table('calls')
        ->where('callerId', $request->input('callerId'))
        ->get();

       foreach($calls as $call){
		if($call->pickup=1){
			$call->pickup = True;
		}
		else{
			$call->pickup = False;
		}
	}
	return $calls;
    }

    /**
    * @author Jake Sylvestre
    * return one person who was not been called yet
    */
    public function toCall(){
      return DB::table('contacts')
        ->where('toCall', 0)
        ->first()
	->toCall;
    }


    /**
    * @author Jake Sylvestre
    * get data about a call by the call id
    */
    public function getCall($id){
      $call = DB::table('calls')
        ->where('id', $id)
        ->first();

      if(count($call)==0){
        return view('errors.404');
      }

      $volunteer = DB::table('volunteers')
        ->where('id', $call->callerId)
        ->first();

      $call->pickup = (bool) $call->pickup;
      return view('call', [
          'call' => $call,
          'callDurationSeconds' => $this->getSecondsInCall($call->duration),
          'afterCall' => $this->getPostTime($call->created_at, $call->duration),
          'volunteer' => $volunteer,
          'averageLength' => $this->getAverageCallLength()
        ]
      );
    }
    /**
    * @author Jake Sylvestre
    * get call length in seconds from minute:second form
    */
    public function getSecondsInCall($duration){
        $time = $this->getMinutesHoursFromDuration($duration);
        return $time['minutes'] * 60 + $time['seconds'];
    }

    /**
    * @author Jake Sylvestre
    * Get average call length
    * precondition, calls in db
    */
    public function getAverageCallLength(){
      $calls = DB::table('calls')
        ->select('duration')
        ->get();
      $duration = 0;
      $count = 0;
      foreach($calls as $call){
        $count ++;
        $time = $this->getMinutesHoursFromDuration($call->duration);
        $callTime = $time['minutes'] * 60 + $time['seconds'];
        $duration += $callTime;
      }
      if($count==0){
        return 0;
      }
      return $duration/$count;
    }

    /**
    * @author Jake Sylvestre
    * Get average call length
    * precondition, calls in db
    */
    public function getAverageCallLengthForUser($id){
      $calls = DB::table('calls')
        ->select('duration')
	->where('callerId', $id)
        ->get();

      $duration = 0;
      $count = 0;
      foreach($calls as $call){
        $count ++;
        $time = $this->getMinutesHoursFromDuration($call->duration);
        $callTime = $time['minutes'] * 60 + $time['seconds'];
        $duration += $callTime;
      }
      if($count==0){
        return json_encode(["seconds" => 0]);
      }
      return json_encode(["seconds" => $duration/$count ]);
    }

    /**
    * @author Jake Sylvestre
    * @param timestamp in a string format
    * @param time in minutes:seconds format
    */
    protected function getPostTime($originalTime, $duration){
      $postCall = strtotime($originalTime);
      $time = $this->getMinutesHoursFromDuration($duration);
      $postCall = $postCall + (($time['minutes'] * 60) + $time['seconds']);
      $callTime =  new \DateTime();
      $callTime->setTimestamp($postCall);
      return $callTime;
    }

    /**
    * @author Jake Sylvestre
    * @param duration of the call
    * return array with minutes and hours
    */
    protected function getMinutesHoursFromDuration($duration){
      $duration = explode(":", $duration);
      return [
          'minutes' => $duration[0],
          'seconds' => $duration[1]
      ];
    }
}
