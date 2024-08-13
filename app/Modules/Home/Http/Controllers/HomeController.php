<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;

class HomeController
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      

        try {
            return view("Home::index");
        }catch(\Exception $e){

            return response()->json($e->getMessage());
            
        }
        
        
    }


}
