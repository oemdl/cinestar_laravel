<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CineStarController extends Controller {

    public function index(){
        return  view('index');
    }

    public function cines() {
        $cines = DB::select('call sp_getCines');
        return view('cines', compact('cines'));
    }

    public function cine($id) {
        $cine = DB::select('call sp_getCine(?)', [$id]);
        $tarifas = DB::select('call sp_getCineTarifas(?)', [$id]);
        $peliculas = DB::select('call sp_getCinePeliculas(?)', [$id]);
        return view('cine', ['cine'=> $cine[0], 'tarifas'=>$tarifas, 'peliculas'=>$peliculas]);
    }

    public function peliculas($id) {
        $id = $id == 'cartelera' ? 1 : ( $id == 'estrenos' ? 2 : 0 );
        $peliculas = DB::select('call sp_getPeliculas(?)', [$id]);
        return view('peliculas', ['peliculas' => $peliculas]);
    }

    public function pelicula($id) {
        $pelicula = DB::select('call sp_getPelicula(?)', [$id]);
        return view('pelicula', ['pelicula' => $pelicula[0]]);
    }

}