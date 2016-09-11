<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Http\Requests;
use DB;
class adminAddContact extends Controller
{
	public function addAContact(Request $request){
		$phone = $request->input('phone');
		DB::table('contacts')->insert(['phone'=>$phone]);
		return redirect('/contacts');
	}
	public function addAContactGet(){
		//$this->BsDataV(10);
		$this->BsDataCo(10);
		$this->BsDataCa(10);
		return view('addContact');
	}
	public function BsDataV($num){
		$c=0;
                while($c<$num){
			$rawJson=file_get_contents("https://randomuser.me/api/");
			$json = json_decode($rawJson);
			$name = $json->results[0]->name->first." ".$json->results[0]->name->last;
			$email = $json->results[0]->email;
			DB::table('volunteers')->insert(['email'=>$email,'name'=>$name,'id'=>rand(0,300000)]);
			$c++;
		}

	}
	public function BsDataCo($num){
		$c=0;
                while($c<$num){
                        $rawJson=file_get_contents("https://randomuser.me/api/");
                        $json = json_decode($rawJson);
                        $phone = $json->results[0]->phone;
                        DB::table('contacts')->insert(['phone'=>$phone,'toCall'=>1]);
			$c++;
                }
        }
	public function BsDataCa($num){
	   	$c=0;
                while($c<$num){
		$callerId=DB::table('volunteers')->inRandomOrder()->first()->id;
		$duration = rand(0,5).''.rand(0,9).":".rand(0,5).''.rand(0,9);
		$pickup = (rand(0,1)==1)?true:false;
		$rawJson=file_get_contents("https://randomuser.me/api/");
                $json = json_decode($rawJson);
                $name = $json->results[0]->name->first." ".$json->results[0]->name->last;
		$phone = $json->results[0]->phone;
		$opinion="";
		$dtStr = date("c", rand(1472688000,1476230400));
		$timestamp = new DateTime($dtStr);
		switch(rand(0,2)){
			case 0:
				$opinion="Negative";
			break;
			case 1:
				$opinion="Positive";
			break;
			default:
				$opinion="Neutral";
			break;
		}
		DB::table('calls')->insert([
					"callerId"=>$callerId,
					"duration"=>$duration,
					"pickup"=>$pickup,
					"name"=>$name,
					"opinion"=>$opinion,
					"phone"=>$phone,
					"created_at"=>$timestamp
					]);

		$c++;
		}
		
	}

}
