<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Response;

class VolunteerController extends Controller
{
	public function makeUser(Request $request){
		if( ($request->input('id')==null) || ($request->input('email')==null)){
			        return Response::json(array(
				    'msg' => 'The required id or email fields were left blank!'
				), 400);
		}
		$volunteer = DB::table('volunteers')
			->where('id', $request->input('id'))
			->where('email', $request->input('email'))
			->first();
		if(isset($volunteer) && !(empty($volunteer))){
                                return Response::json(array(
                                    'msg' => 'This account already exists, please create a new one.'
                                ), 400);	
		}else{
			DB::table('volunters')
				->insert(
						[
							'id' => $request->input('id'),
							'email' => $request->input('email')
						]
				);
		}    
	}
}
