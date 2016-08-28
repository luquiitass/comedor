<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function save(Request $request){

    	$user = \Auth::user();

    	$file = $request->file('imagen');

        $imagen = \Image::make($file);

    	//dd($file);

        $extension = $file->getClientOriginalExtension();



        $nombreImagen = $user->id. '.' . $extension ;


        //$imagen->resize(240,240);
        $path = public_path().'storage/'.$nombreImagen;

        dd($path);

        $imagen->save($path);


    	//$file->move(public_path() . 'storage/', $imageName);
    	//dd(\Storage::disk('local')->files());

    	//\Storage::disk('local')->put($nombreImagen,  \File::get($file));

        $user->imagen = $nombreImagen;

        $user->save();

    	return redirect()->back();
    }
}
