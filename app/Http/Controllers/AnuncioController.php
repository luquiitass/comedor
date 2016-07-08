<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Anuncio;
use App\User;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class AnuncioController
 *
 * @author  The scaffold-interface created at 2016-07-06 05:12:50pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AnuncioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios = Anuncio::all();
        return view('anuncio.index',compact('anuncios'));
    }

    public function anuncios($id)
    {
        $fechaActual = date("Y-m-d", time());
        $anuncios = Anuncio::where('hasta','>',$fechaActual)->get();
        $user = User::findOrfail($id);

        return view('anuncio.index',compact('anuncios','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('anuncio.create'
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');

        $anuncio = new Anuncio();

        
        $anuncio->titulo = $input['titulo'];

        
        $anuncio->cuerpo = $input['cuerpo'];

        
        $anuncio->hasta = $input['hasta'];

        
        
        $anuncio->save();

        return redirect('anuncio');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Request::ajax())
        {
            return URL::to('anuncio/'.$id);
        }

        $anuncio = Anuncio::findOrfail($id);
        return view('anuncio.show',compact('anuncio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Request::ajax())
        {
            return URL::to('anuncio/'. $id . '/edit');
        }

        
        $anuncio = Anuncio::findOrfail($id);
        return view('anuncio.edit',compact('anuncio'
                )
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Request::except('_token');

        $anuncio = Anuncio::findOrfail($id);
    	
        $anuncio->titulo = $input['titulo'];
        
        $anuncio->cuerpo = $input['cuerpo'];
        
        $anuncio->hasta = $input['hasta'];
        
        
        $anuncio->save();

        return redirect('anuncio');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link  https://github.com/amranidev/ajaxis
     *
     * @return  String
     */
    public function DeleteMsg($id)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/anuncio/'. $id . '/delete/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$anuncio = Anuncio::findOrfail($id);
     	$anuncio->delete();
        return URL::to('anuncio');
    }
}
