@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Customers List</b>
                    </div>

                    <div class="card-body">
                        <p>
                            <a href="{{ route('customers.create') }}">Create New Customer</a>
                        </p>
                        <ul>

                        @forelse ($customers as $customer)
                                <li>
                                    <a href="{{ route('customers.show', ['customer' => $customer->id]) }}">{{ $customer->name }}</a>
                                </li>
                        @empty
                            No Customers!
                        @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection ('content')
