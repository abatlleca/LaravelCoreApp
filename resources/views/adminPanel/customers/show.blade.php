@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8"><b>{{ $customer->name }}</b></div>
                            <div class="col-md-4 text-right">
                                <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}">Edit</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">ID: {{ $customer->id }}</div>
                        <div class="row">Customer: {{ $customer->name }}</div>
                        <p></p>
                        <ul>Employees:
                            @forelse($customer->users as $user)
                                <li><a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }}</a> </li>
                            @empty
                                No Employees
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')
