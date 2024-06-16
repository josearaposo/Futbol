<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJugadorRequest;
use App\Http\Requests\UpdateJugadorRequest;
use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $order = $request->query('order', 'nombre');
        $order_dir = $request->query('order_dir', 'asc');

        $jugadores = Jugador::orderBy($order, $order_dir)->paginate(10);

        return view('jugadores.index', [
        	'jugadores' => $jugadores,
            'order' => $order,
            'order_dir' => $order_dir,
    	]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jugadores.create');
    }


//   Opcional
//     public function create()
//     {
//      return view('ordenadores.create', [
//          'aulas' => Aula::all(),
//      ]);
//     }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',




        ]);




        $jugador = new Jugador();
        $jugador->titulo = $validated['titulo'];
        $jugador->autor = $validated['autor'];
        $jugador->save();
        session()->flash('success', 'El jugador se ha creado correctamente.');
        return redirect()->route('jugadores.index');
    }




    /**
     * Display the specified resource.
     */
    public function show(Jugador $jugador)
    {
     return view('jugadores.show', [
         'jugador' => $jugador,
     ]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jugador $jugador)
    {
        return view('jugadores.edit', [
            'jugador' => $jugador,
        ]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jugador $jugador)
    {
     $validated = $request->validate([
         'titulo' => 'required|max:255',
         'autor' => 'required|max:255',
  'origen' => 'exists:aeropuertos,id|required',




     ]);


     $jugador->titulo = $validated['titulo'];
     $jugador->autor = $validated['autor'];
     $jugador->save();
     session()->flash('success', 'El jugador se ha modificado correctamente.');
     return redirect()->route('jugadores.index');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('jugadores.index');
    }
}
