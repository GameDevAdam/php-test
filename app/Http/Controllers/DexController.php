<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DexController extends Controller
{
    //
    public function index()
    {
        // Tried to use the GuzzleHttp library to fetch data from an API but encountered an error
        // cURL error 77: error setting certificate file
        // Will come back to it if I have time
        /*$client = new \GuzzleHttp\Client();
        $response = $client->get("https://jsonplaceholder.typicode.com/posts");

        return view("app", [
            "dex" => $response->getBody()
        ]);*/
        return view("app");
    }

    public function show($id)
    {
        // Since GuzzleHttp library was not working, I decided to pass the id to the view
        return view("show", ["id"=> $id]);
    }
}
