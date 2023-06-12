<?php

namespace App\Http\Controllers\agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;


class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tickets = Ticket::all();

        return view('agent/index', compact('tickets'));
    }

    public function tickets()
    {
        $tickets = Ticket::all();

        return view('agent/tickets/tickets', compact('tickets'));
    }

    public function tickets_specifiques()
    {
        $tickets = Ticket::all();

        return view('agent/tickets/tickets_specifiques', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agent/tickets/creer_ticket');
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
        return view('agent/tickets/ticket');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()//string $id
    {
        return view('agent/tickets/modifier_ticket');
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
