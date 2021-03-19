<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notas;

class NotasController extends Controller
{
    public function index() {
        $notas = Notas::all();  //DB::table('notas')->get();
        return view('notas', ['notas' => $notas]);
    }

    function agregar() {
        return view('agregar');
    }

    function crear(Request $request) {
        Notas::create([
            'titulo' => $request->input('title'),
            'contenido' => $request->input('content'),
        ]);
    
        return redirect('/notas');
    }

    function editar($id) {
        $nota = Notas::find($id);
        return view('editar', ['nota' => $nota]);
    }

    function update(Notas $notas, Request $request) {
        $notas->update([
            'titulo' => $request->input('title'),
            'contenido' => $request->input('content'),
        ]);

        return redirect('/notas');
    }

    function destroy($id) {
        $notas = Notas::find($id);
        $notas->delete();
        return redirect('/notas');
    }
}
