<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    //
    public function index()
    {

    	$client = new Client();

    	$res = $client->request('GET', 'https://covid-19-data.p.rapidapi.com/country/code', [
    		'query' => ['code' => 'PH','format' => 'json'],
    		'headers' => ['x-rapidapi-host' => 'covid-19-data.p.rapidapi.com','x-rapidapi-key' => '5277627becmsh324b1246ee96db0p13882djsncff8cecb1641']
    	]);

    	$result = json_decode($res->getBody()->getContents(),true);
    	// return $result;
    	return view('welcome')->with('data',$result);
    }
}
