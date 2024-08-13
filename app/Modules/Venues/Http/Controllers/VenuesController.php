<?php

namespace App\Modules\Venues\Http\Controllers;

use Illuminate\Http\Request;

class VenuesController
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index($place)
    {
        $headers =  ['Authorization' => env('FOUR_SQUARE_TOKEN'),"accept"=> 'application/json'];
        $weather_api = env('WEATHER_TOKEN');

        $near ="$place,japan";

        try {

            $client = new \GuzzleHttp\Client();
            $url = "https://api.foursquare.com/v3/places/search?near=$near";
            

            $weather_url = "https:/api.openweathermap.org/data/2.5/weather?q=$near&appid=$weather_api&units=metric";                            
            
            $weather_response = json_decode($client->get($weather_url)->getBody());    
            
     

      
            
            $venues_response = json_decode($client->get($url,["headers"=>$headers])->getBody())->results;
            foreach($venues_response as $value){                
                $venues_photos_url = "https://api.foursquare.com/v3/places/$value->fsq_id/photos?limit=1";                            
                $venues_photos_response = json_decode($client->get($venues_photos_url,["headers"=>$headers])->getBody());                                                  
                
                if( isset($venues_photos_response[0])){
                    $value->photo = $venues_photos_response[0]->prefix."400x400".$venues_photos_response[0]->suffix;
                }else{
                    $value->photo
                     = "";
                }                
            }

            
            return view("Venues::index",["nearby_venues"=>$venues_response,"place"=>$place,"weather" => $weather_response]);
        }catch(\Exception $e){

            return response()->json($e->getMessage());
            
        }
        
    }

    public function view_venue($place,$venue_id)
    {   
        $headers =  ['Authorization' => env('FOUR_SQUARE_TOKEN'),"accept"=> 'application/json'];
        try {

            $client = new \GuzzleHttp\Client();
            $venue_url = "https://api.foursquare.com/v3/places/$venue_id";
                              
            $venue_response = json_decode($client->get($venue_url,["headers"=>$headers])->getBody());
            
            $venue_photos_url = "https://api.foursquare.com/v3/places/$venue_id/photos";

            $venue_photos_response = json_decode($client->get($venue_photos_url,["headers"=>$headers])->getBody());
            
            
            return view("Venues::venue",["venue"=>$venue_response,"photos"=>$venue_photos_response]);
        }catch(\Exception $e){

            return response()->json($e->getMessage());
            
        }
        
    }
}
