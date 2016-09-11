<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class LastCall extends Controller
{
    public function getLastCall(){
	$id = DB::table('calls')
		->max('id');
	return Redirect("/call/$id");
    }
}
