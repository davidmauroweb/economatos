<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
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
        $lista = usuarios::all()->where('adm', 0)->sortBy('name');
        $admins = usuarios::all()->where('adm', 1)->sortBy('name');
        return view ('usuarios',['econo'=>$lista,'admins'=>$admins]);
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
        $agrego = new usuarios();
        $agrego->name = $request->name;
        $agrego->email = $request->email;
        $agrego->password = Hash::make($request->password);
        $agrego->capita = $request->capita;
        $agrego->adm = $request->adm;
        $agrego->save();
        return redirect()->route('usuarios.index')->with('mensajeOk',$request->name.' agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuarios $usuarios)
    {
        $upd = usuarios::find($usuarios->id);
        $upd->name = $request->name;
        $upd->email = $request->email;
        if (isset($request->password)){
        $upd->password = Hash::make($request->password);
        }
        $upd->capita = $request->capita;
        $upd->adm = $request->adm;
        $upd->save();
        return redirect()->route('usuarios.index')->with('mensajeOk',$request->name.' actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuarios $usuarios)
    {
        $del = usuarios::find($usuarios->id);
        $del->delete();
        return redirect()->route ('usuarios.index')->with('mensajeOk',$usuarios->name.' eliminado');
    }
}
