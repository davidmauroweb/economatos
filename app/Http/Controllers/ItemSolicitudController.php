<?php

namespace App\Http\Controllers;

use App\Models\{ItemSolicitud,items,solicitud};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemSolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index($sol)
    {
        $is=DB::table('item_solicituds')->where('idSolicitud', $sol)->join('items','items.idItem','item_solicituds.idItem')->orderBy('categoria')->orderBy('nombItem')->get();
        $lista=items::all()->sortBy('categoria');
        $solicitud=solicitud::all()->where('idSolicitud',$sol)->first();
        return view ('itemsSolicitud',['is'=>$is, 'ls'=>$lista, 'sl'=>$solicitud]);
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
        //Chequeo si Existe el item no exista en esa solicitud
        $chequeo =  ItemSolicitud::all()->where('idSolicitud',$request->idSolicitud)->where('idItem', $request->idItem)->first();
        if (isset($chequeo->idItem)){
            $tipo="mensajeNo";
            $mensaje="Existe el item en esta solicitud";
        }
        else{
        //Cargo los items a la solicitud $request->idSolicitud
            $agrego = new ItemSolicitud();
            $agrego->idSolicitud = $request->idSolicitud;
            $agrego->idItem = $request->idItem;
            $agrego->cantidad = $request->cantidad;
            $agrego->save();
            $tipo="mensajeOk";
            $mensaje="Item agregado correctamente";
        }
        return redirect()->route('itemsolicitud.index',$request->idSolicitud)->with($tipo,$mensaje);
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemSolicitud $itemSolicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemSolicitud $itemSolicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemSolicitud $item)
    {
        $upd = ItemSolicitud::find($item->idItemSolicitud);
        $upd->idItem = $request->idItem;
        $upd->cantidad = $request->cantidad;
        $upd->save();
        return redirect()->route('itemsolicitud.index',$item->idSolicitud)->with('mensajeOk',' Solicitud actualizada correctamente');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemSolicitud $item)
    {
        $del = ItemSolicitud::find($item->idItemSolicitud);
        $del->delete();
        return redirect()->route ('itemsolicitud.index',$item->idSolicitud)->with('mensajeOk','Item eliminado');
    }
}
