<?php

namespace App\Http\Controllers\Admin;

use App\Actuation;
use App\Http\Requests\StoreActuation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActuationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ticket_id = 0)
    {
        $actuation = new Actuation();
        $actuation->ticket_id = $ticket_id;
        $actuation->origin = "Tech";

        return view('adminPanel.actuations.create', ['actuation' => $actuation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActuation $request)
    {
        //validate data
        $validateData = $request->validated();
        $newActuation = new Actuation();
        $newActuation->fill($validateData);
        $newActuation->creator_id = auth()->user()->id;
        $newActuation->save();

        $request->session()->flash('status', 'New Actuation Created');

        return redirect()->route('ad.tickets.show', ['ticket' => $newActuation->ticket_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actuation  $actuation
     * @return \Illuminate\Http\Response
     */
    public function show(Actuation $actuation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actuation  $actuation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actuation = Actuation::findOrFail($id);

        return view('adminPanel.actuations.edit', ['actuation' => $actuation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actuation  $actuation
     * @return \Illuminate\Http\Response
     */
    public function update(StoreActuation $request, $id)
    {
        //validate data
        $validateData = $request->validated();
        $actuation = Actuation::findOrFail($id);
        $actuation->fill($validateData);
        $actuation->save();

        $request->session()->flash('status', 'Actuation Edited');

        return redirect()->route('ad.tickets.show', ['ticket' => $actuation->ticket_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actuation  $actuation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actuation $actuation)
    {
        //
    }
}
