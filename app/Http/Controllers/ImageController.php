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

    	//$file->move(public_path() . 'storage/', $imageName);
    	//dd(\Storage::disk('local')->files());

    	\Storage::disk('local')->put($user->id,  \File::get($file));

    	return redirect()->back();
    }
}
