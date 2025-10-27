<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Si el usuario selecciona una fecha, se usa, si no, tomamos la fecha de hoy
        $selectedDate = $request->input('date') 
            ? Carbon::parse($request->input('date'))->setTimezone('America/Argentina/Buenos_Aires') 
            : Carbon::today();

        // Filtrar los pedidos por esa fecha
        $orders = Order::whereDate('delivery_date', $selectedDate)->get();

        return view('dashboard', compact('orders', 'selectedDate'));



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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
