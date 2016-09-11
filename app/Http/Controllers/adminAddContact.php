<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class adminAddContact extends Controller
{
	public function addAContact(Request $request){
		$phone = $request->input('phone');
		DB::table('contacts')->insert(['phone'=>$phone]);
		return redirect('/addContact');
	}
	public function addAContactGet(){
		return view('addContact');
	}
}
