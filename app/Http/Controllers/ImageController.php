<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

class ImageController extends Controller
{
    //
    public function save(Request $request){
    	dd(Request::except('_token'));
    }
}
