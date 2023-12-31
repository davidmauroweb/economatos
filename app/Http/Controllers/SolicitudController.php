<?php

namespace App\Http\Controllers;

use App\Models\solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //Traigo todas las solicitudes con los nombre de los economatos a las que pertenece
        $sol = DB::table('solicituds')->where('estado','>',0)->orderBy('estado')->orderBy('solicituds.updated_at')->join('users','users.id','solicituds.idEconomato')->get();
        //echo $sol;
        return view ('solicitud-muni',['sol'=>$sol]);
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
        //Trae solamente las solicitudes del economato que consulta en de mas nuevas a mas antiguas.
        $sol = solicitud::all()->where('idEconomato', $econo)->sortByDesc('idSolicitud');
        //Determino si hay solicitudes pendientes de cierre 0 o cerradas y no procesadas 1 para no abrir otra sin cerrar la anterior o que queden pendientes de ser procesadas.
        $abierta = solicitud::all()->where('idEconomato', $econo)->where('estado','<',2);
        return view ('solicitud',['sol'=>$sol, 'ab'=>$abierta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, solicitud $sol)
    {
        $upd = solicitud::find($sol->idSolicitud);
        $upd->estado = 2;
        $upd->save();
        return redirect()->route('solicitudes.index')->with('mensajeOk',' Solicitud procesada correctamente');
        
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
        return redirect()->route('solicitudes.show',$sol->idEconomato)->with('mensajeOk',' Solicitud actualizada correctamente');
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
