<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;


class TicketController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        $tickets = Ticket::all();

        return view('admin/index', compact('tickets'));
    }

    public function tickets()
    {
        $tickets = Ticket::all();

        return view('admin/tickets/tickets', compact('tickets'));
    }

    public function tickets_specifiques()
    {
        $tickets = Ticket::all();

        return view('admin/tickets/tickets_specifiques', compact('tickets'));
    }

    
    public function create()
    {
        return view('admin/tickets/creer_ticket');
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show()//string $id
    {
        return view('admin/tickets/ticket');
    }

    
    public function edit()//string $id
    {
        return view('admin/tickets/modifier_ticket');
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
