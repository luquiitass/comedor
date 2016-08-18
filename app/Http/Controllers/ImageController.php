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

        $extension = $file->getClientOriginalExtension();



        $nombreImagen = $user->id. '.' . $extension ;


    	//$file->move(public_path() . 'storage/', $imageName);
    	//dd(\Storage::disk('local')->files());

    	\Storage::disk('local')->put($nombreImagen,  \File::get($file));

        $user->imagen = $nombreImagen;

        $user->save();

    	return redirect()->back();
    }
}
