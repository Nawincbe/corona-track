<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cases;
use DB;
use GuzzleHttp\Client;

class CasesController extends Controller
{
	public function getCases(){
		$client = new Client([
			'base_uri' => 'https://api.coronatracker.com',
		]);

		$response = $client->request('GET', '/v5/analytics/newcases/country', [
			'query' => [
				'countryCode' => 'IN',
				'startDate' => '2020-01-01',
				'endDate' => '2021-04-13',
			]
		]);

		$body = $response->getBody();
		$arr_body = json_decode($body);
		foreach($arr_body as $single_case){
			
			$data = new Cases();
			$data->country_code = $single_case->country_code;
			$data->affected = $single_case->new_infections;
			$data->death = $single_case->new_deaths;
			$data->recovered = $single_case->new_recovered;
			$data->last_updated = date('Y-m-d', strtotime($single_case->last_updated));
			$data->save();			
		}
		return response()->json('Successfully added');
		
	}
	
	public function index(){
		$cases = DB::select('select * from cases');
		return view('dashboard',['cases'=>$cases]);
	}
}
