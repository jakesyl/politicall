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
            'phone' => $request->input('phone'),
            'name' => $request->input('name'),
            'opinion' => $request->input('opinion')
            'toCall' => $request->input('toCall')
          ]
        );
    }
}
