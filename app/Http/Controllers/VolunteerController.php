<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Response;

class VolunteerController extends Controller
{

	/**
	* @author Jake Sylvestre
	* return a 400 if account exists/invalid, 200 if account created
	*/
	public function makeUser(Request $request){
		if(( ($request->input('id')==null) || ($request->input('email')==null) || ($request->input('name')==null) )){
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
			DB::table('volunteers')
				->insert(
						[
							'id' => $request->input('id'),
							'email' => $request->input('email'),
							'name' => $request->input('name')
						]
				);
		}
	}
	/**
	* @author Jake Sylvestre
	* return a 400 if uid doesn't exist
	* 200 if valid
	*/
	public function loginUser(Request $request){
		$volunteer = DB::table('volunteers')
			->where('id', $request->input('id'))
			->first();
		
		if (!(isset($volunteer) && !(empty($volunteer)))){
			return Response::json(array(
					'msg' => 'This account doesn\'t exists.'
			), 400);
			}
 }
}
