<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client; 


class RecordController extends Controller
{
    public function create_record(Request $request)
    {
        $client = new Client(['base_uri' => 'http://127.0.0.1:5000']);
        $number = $request->route('number'); // Get the integer from the route
        $response = $client->request('POST', '/generate_labels/' . $number);
        return $response->getBody();
    }
        
    

    public function record_labels(Request $request)
    {
        $client = new Client(['base_uri' => 'http://127.0.0.1:5000']);
        $response = $client->request('GET', '/record_labels');
        return $response->getBody();
    }
}
