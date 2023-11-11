<?php

namespace App\Http\Controllers;

use App\Models\solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agrego = new solicitud();
        $agrego->idEconomato = $request->idEconomato;
        $agrego->descripcion = $request->descripcion;
        $agrego->estado = 0;
        $agrego->save();
        return redirect()->route('solicitudes.show',$request->idEconomato)->with('mensajeOk','Solicitud Generada Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($econo)
    {
        $sol = solicitud::all()->where('idEconomato', $econo)->sortByDesc('idSolicitud');
        $abierta = solicitud::all()->where('idEconomato', $econo)->where('estado',0);
        return view ('solicitud',['sol'=>$sol, 'ab'=>$abierta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, solicitud $sol)
    {
        $upd = solicitud::find($sol->idSolicitud);
        $upd->descripcion = $request->descripcion;
        $upd->estado = $request->estado;
        $upd->save();
        return redirect()->route('items.index')->with('mensajeOk',' Solicitud actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(solicitud $sol)
    {
        $del = solicitud::find($sol->idSolicitud);
        $del->delete();
        return redirect()->route('solicitudes.show',$sol->idEconomato)->with('mensajeOk','Solicitud Eliminada Correctamente');
    }
}
