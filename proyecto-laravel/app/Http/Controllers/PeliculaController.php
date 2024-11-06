<?php

namespace App\Http\Controllers; //un espacio de trabajo de esta clase

use Illuminate\Http\Request;
use App\Models\Pelicula;

class PeliculaController extends Controller{
    

    public function create(){
        $pelicula=new Pelicula();

        $pelicula->issan='3456789';
        $pelicula->titulo= 'SuperMan';
        $pelicula->ano='1999';
        $pelicula->director='Andy Becker';

        $pelicula->save();
        return $pelicula;
    }

    public function show(){
        //$peliculas=Pelicula::all();
        
        //$peliculas=Pelicula::where('ano', '>', 2000)->orderBy('ano', 'desc')->get();
        
        $peliculas=Pelicula::orderBy('ano', 'asc') ->get();      
        
        //return view('peliculas.show', ['peliculas'->Pelicula]);
        return view('peliculas.show', compact('peliculas'));
    }

    public function update(){
        $pelicula= Pelicula::find(1);

        $pelicula->issan= '123';
        $pelicula->titulo= 'Título actualizado';
        $pelicula->ano=2015;

        $pelicula->save();

        //otra forma, esto solo devuelve el numero de registros actualizados

        //$pelicula= Pelicula::where('id', 1)->update( ['titulo'=>'Título actualizado 2', 'ano'=> 2024]);
        //$pelicula=Peliculas::find(1)  //si queremos que devuelva los datos cambiados del primero
        //return $pelicula;
    }

    public function delete(){
        $pelicula=Pelicula::find(1);
        $pelicula->delete();
        return "Eliminado correctamente";
    }

    public function store(Request $request){ //el request para recoger los campos del formulario de home
        $pelicula=new Pelicula();
        $pelicula->issan=$request->issan;
        $pelicula->titulo= $request->titulo;
        $pelicula->ano=$request->ano;
        $pelicula->director= $request->director;
        $pelicula->save();

        return $pelicula;

    }
}

?>