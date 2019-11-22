<?php

namespace App\Http\Controllers\Customer;

use App\Actuation;
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
     * Display all actuations for a given ticket
     * @param $ticket
     */
    public function list($ticket){
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Actuation $actuation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actuation  $actuation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actuation $actuation)
    {
        //
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
