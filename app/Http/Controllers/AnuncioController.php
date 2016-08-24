<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Anuncio;
use App\User;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Carbon\Carbon;

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
        $user= \Auth::user();
        $fechaActual = date("Y-m-d", time());
        $anuncios = Anuncio::join('users','users.id','=','anuncios.user_id')
                        ->where('hasta','>',$fechaActual)
                        ->select('users.nombre','users.apellido','anuncios.titulo','anuncios.cuerpo','anuncios.hasta','anuncios.created_at')
                        ->get();
        return view('anuncio.index',compact('anuncios','user'));
    }

    public function anuncios()
    {
        
        $user = \Auth::user();//recupera el usurio Logueado
        
        $fechaActual = date("Y-m-d", time());//obtiene la fecha actual
        
        $anuncios = Anuncio::join('users','users.id','=','anuncios.user_id')->where('hasta','>',$fechaActual)->select('users.apellido','users.nombre','users.id as user_id','anuncios.titulo','anuncios.cuerpo','anuncios.created_at','anuncios.hasta')->get();///obtiene todos los anuncios que se encuentran visibles;
        //dd($anuncios);
        
        $misAnuncios= $user->anuncios()->get();
        $fechaActual = Carbon::now()->formatLocalized('%d/%m/%Y');

        return view('anuncio.admin_index',compact('anuncios','user','misAnuncios','fechaActual'));
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
        $user= \Auth::user();

        $input = Request::except('_token');

        //$anuncio = new Anuncio();
        
        //$anuncio->titulo = $input['titulo'];

        
        //$anuncio->cuerpo = $input['cuerpo'];

        $date= $input['hasta'];

        //$anuncio->hasta = date("Y-m-d", strtotime($date));

        $input['hasta'] = date("Y-m-d", strtotime($date)); 

        $input['user_id'] = $user->id;

        //$anuncio->user()->associate($user);

        Anuncio::create($input);

        

        return redirect()->route('admin_anuncios');
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
        $anuncio = Anuncio::findOrfail($id);

        if(Request::ajax())
        {
            $url = '/anuncio/'. $id . '/update';
            return Ajaxis::BtEditFormModal($anuncio->editarDatosAjaxis(),$url);
        }

        return view('anuncio.edit',compact('anuncio'));
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
        
        $anuncio->hasta = date("Y-m-d", strtotime($input['hasta'])); 
        
        $anuncio->save();

        return json_encode(array('mensaje'=> 'Modificado','location' => URL::to('anuncios')));
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
        $msg = Ajaxis::BtDeleting('Eliminar','¿Seguro que desea eliminar este anuncio?','/anuncio/'. $id . '/delete/');

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
        return URL::to('anuncios');
    }
}
