<?php

namespace App\Http\Controllers\client;
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

        return view('client/index', compact('tickets'));
    }

    public function tickets()
    {
        $tickets = Ticket::all();

        return view('client/tickets/tickets', compact('tickets'));
    }
    
    public function create()
    {
        return view('client/tickets/creer_ticket');
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show()//string $id
    {
        return view('client/tickets/ticket');
    }

    
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
