<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Request;
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
            'callerId' => $request->input('id')
            'duration' => $request->input('duration'),
            'pickup' => $request->input('pickup'),
            'opinion' => $request->input('opinion')
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
}
