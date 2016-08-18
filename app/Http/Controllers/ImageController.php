<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function save(Request $request){

    	$user = \Auth::user();

    	$file = $request->file('imagen');

    	//dd($file);

    	$imageName = $user->id ;

    	$file->move(public_path() . 'storage/', $imageName);


    	return redirect()->back();
    }
}
