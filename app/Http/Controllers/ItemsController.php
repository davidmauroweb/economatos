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
        $lista = items::all()->sortBy('categoria');
        return view ('items',['lista'=>$lista]);
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
        $agrego = new items();
        $agrego->nombItem = $request->nombItem;
        $agrego->categoria = $request->categoria;
        $agrego->rafam = $request->rafam;
        $agrego->save();
        return redirect()->route('items.index')->with('mensajeOk',$request->name.' agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(items $items)
    {
        //
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
        $upd = items::find($items->idItem);
        $upd->nombItem = $request->nombItem;
        $upd->categoria = $request->categoria;
        $upd->rafam = $request->rafam;
        $upd->save();
        return redirect()->route('items.index')->with('mensajeOk',$request->name.' actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(items $items)
    {
        //
    }
}
