<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class adminAddContact extends Controller
{
	public function addAContact(Request $request){
		$phone = $request->input('phone');
		DB::table('contact')->insert(['phone'=>$phone]);
		return redirect('/addContact');
	}
	public function addAContactGet(){
		return view('addContact');
	}
}
