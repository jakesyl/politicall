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
            'phone' => $request->input('phone')
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
      return DB::table('calls')
        ->where('callerId', $request->input('callerId'))
        ->get();
    }

    /**
    * @author Jake Sylvestre
    * return one person who was not been called yet
    */
    public function toCall(){
      return DB::table('contacts')
        ->where('toCall', 0)
        ->first();
    }

    public function getCall($id){
      $call = DB::table('calls')
        ->where('id', $id)
        ->first();

      if(count($call)==0){
        return view('errors.404');
      }
      return view('call', ['call' => $call]);


    }
}
