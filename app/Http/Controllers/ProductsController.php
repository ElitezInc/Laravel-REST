<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Http\Resources\Product as ProductsResource;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($city)
    {
        // Initialize curl client
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.meteo.lt/v1/places/' . $city . '/forecasts/long-term',
        ]);

        $resp = curl_exec($curl);

        // Check if service is reachable
        if(curl_errno($curl))
        {
            return response()->json([
                'status'=>'error', 
                'message'=>'Error connecting to external API', 
            ], 500);
        }

        // Get HTTP response code and close connection
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        // Show error message if response is not successful
        if($http_code != 200)
            return response()->json(json_decode($resp, true), $http_code);

        // Find weather code inside JSON result
        $Weather = json_decode($resp, true)['forecastTimestamps'][0]['conditionCode'];

        //Select a few products from database randomly
        $Products = Product::all()->random(rand(3,7))->toArray();

        return response()->json([
            'city'=> $city, 
            'current_weather'=> $Weather, 
            'recommended_products' => $Products
        ], 200);
    }
}
