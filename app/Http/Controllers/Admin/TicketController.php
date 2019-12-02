<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Requests\StoreTicket;
use App\Menu;
use App\Status;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('list', Ticket::class);

        $statuses = Status::orderBy('name')->get();

        $tickets = Ticket::filter($request)
            ->orderBy('updated_at')
            ->with('customer')
            ->with('status')
            ->with('actuations')
            ->get();
//        dd($tickets);
        return view('adminPanel.tickets.index', [
            'tickets' => $tickets,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($customer_id = 0)
    {
        $this->authorize('create', Ticket::class);

        $ticket = new Menu();
        $ticket->customer_id = $customer_id;
        $ticket->priority = 5;
//        $ticket->creator_id = auth()->user()->id;
        $ticket->status = Status::where('name', 'New')->first();

        $customers = Customer::orderBy('name')
        ->get();

        $statuses = Status::orderBy('name')
        ->get();

        return view('adminPanel.tickets.create', [
            'ticket' => $ticket,
            'customers' => $customers,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket $request)
    {
        $this->authorize('create', Ticket::class);

        //validate data
        $validateData = $request->validated();
        $newTicket = new Ticket();
        $newTicket->fill($validateData);
        $newTicket->creator_id = auth()->user()->id;

        $newTicket->save();

        $request->session()->flash('status', 'New Ticket Created');

        return redirect()->route('ad.tickets.show', ['ticket' => $newTicket->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::with(['actuations' => function ($q){
            $q->orderBy('created_at', 'desc');
        }])
        ->findOrFail($id);

        $this->authorize('show', $ticket);

        return view('adminPanel.tickets.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $this->authorize('update', $ticket);

        $customers = Customer::orderBy('name')
            ->get();

        $statuses = Status::orderBy('name')
            ->get();

        return view('adminPanel.tickets.edit', [
            'ticket' => $ticket,
            'customers' => $customers,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTicket $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $this->authorize('update', $ticket);

        $validateData = $request->validated();
        $ticket->fill($validateData);
        $ticket->save();

        $request->session()->flash('status', 'New Ticket Edited');

        return redirect()->route('ad.tickets.show', ['ticket' => $ticket->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
