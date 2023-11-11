<?php

namespace App\Http\Controllers;

use App\Models\ItemSolicitud;
use Illuminate\Http\Request;

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
        //
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
    public function update(Request $request, ItemSolicitud $itemSolicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemSolicitud $itemSolicitud)
    {
        //
    }
}
