<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\noticia;
use Image;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias=noticia::all();
        return view("noticias.index",compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("noticias.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $noticia = new noticia($request->all());
        if($request->hasFile('urlfoto')){
            $urlfoto = $request->file('urlfoto');
            $nombreurlfoto = str_slug($request->titulo).'.'.$urlfoto->guessExtension();
            $ruta=public_path('/dist/img/noticias/'.$nombreurlfoto);
            Image::make($urlfoto->getRealPath())
                    ->resize(500,null, function($constraint){
                         $constraint->ascpectRatio();
                        })
                    ->save($ruta,72);
            $noticia->urlfoto = $nombreurlfoto;

            $request->session()->flash('alert-success', 'Notice was successful added!');
            return redirect()->route("noticias.index");
        }

        } catch (\Throwable $th) {
            //throw $th;
            $request->session()->flash('alert-danger', 'Notice not added!'.' '.$th );
            return redirect()->route("noticias.index");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
