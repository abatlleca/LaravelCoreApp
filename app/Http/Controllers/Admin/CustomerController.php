<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Requests\StoreCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('name')->get();
        return view('adminPanel.customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newCustomer = new Customer();
        $newCustomer->isActive = 1;

        return view('adminPanel.customers.create', ['customer' => $newCustomer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomer $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomer $request)
    {
        $validateData = $request->validated();
        $newCustomer = Customer::create($validateData);

        $request->session()->flash('status', 'New Customer Created');

        return redirect()->route('customers.show', ['customer' => $newCustomer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::with('users')
            ->findOrFail($id);

        return view('adminPanel.customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('adminPanel.customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCustomer $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomer $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $validateData = $request->validated();
        $customer->fill($validateData);
        $customer->save();

        $request->session()->flash('status', 'New Customer Created');

        return redirect()->route('customers.show', ['customer' => $customer->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
