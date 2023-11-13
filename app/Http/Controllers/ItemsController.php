<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car=items::all()->where('categoria', '=','Carnes');
        $lac=items::all()->where('categoria', '=','Lácteos');
        $fyv=items::all()->where('categoria', '=','Frutas y Verduras');
        $pan=items::all()->where('categoria', '=','Panadería');
        $sec=items::all()->where('categoria', '=','Secos');
        $lim=items::all()->where('categoria', '=','Limpieza');
        $hig=items::all()->where('categoria', '=','Higiene');
        $pap=items::all()->where('categoria', '=','Papelería');
        $otr=items::all()->where('categoria', '=','Otros');
        return view ('items',['car'=>$car,'lac'=>$lac,'fyv'=>$fyv,'pan'=>$pan,'sec'=>$sec,'lim'=>$lim,'hig'=>$hig,'pap'=>$pap,'otr'=>$otr]);
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
        //Chequeo que no exista otro item con el mismo cogido de rafam
        $chequeo = items::all()->where('rafam',$request->rafam)->first();
        if (isset($chequeo->idItem)){
            $tipo="mensajeNo";
            $mensaje=" El código ".$request->rafam." de RAFAM lo tiene ".$chequeo->nombItem;
        }
        else{
            $agrego = new items();
            $agrego->nombItem = $request->nombItem;
            $agrego->categoria = $request->categoria;
            $agrego->medida = $request->medida;
            $agrego->rafam = $request->rafam;
            $agrego->save();
            $tipo="mensajeOk";
            $mensaje=$request->name." agregado correctamente";    
        }
        return redirect()->route('items.index')->with($tipo,$mensaje);
    }

    /**
     * Display the specified resource.
     */
    public function show($cat)
    {
        $res=items::all()->where('categoria', '=', $cat);
        echo $res;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, items $items)
    {
        $chequeo = items::all()->where('rafam',$request->rafam)->first();
        if (isset($chequeo->idItem)){
            $tipo="mensajeNo";
            $mensaje=" El código ".$request->rafam." de RAFAM lo tiene ".$chequeo->nombItem;
        }else{
            $upd = items::find($items->idItem);
            $upd->nombItem = $request->nombItem;
            $upd->categoria = $request->categoria;
            $upd->medida = $request->medida;
            $upd->rafam = $request->rafam;
            $upd->save();
            $tipo="mensajeOk";
            $mensaje=$request->name." actualizado correctamente";
        }
        return redirect()->route('items.index')->with($tipo,$mensaje);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(items $items)
    {
        //
    }
}
