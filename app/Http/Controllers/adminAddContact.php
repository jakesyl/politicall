<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class adminAddContact extends Controller
{
	public function addAContact(Request $request){
		$phone = $request->input('phone');
		$name = $request->input('name');
		DB::table('contact')->insert(['name'=>$name,'phone'=>$phone]);
		return redirect('/addContact');
	}
	public function addAContactGet(){
		return view('addContact');
	}
}
