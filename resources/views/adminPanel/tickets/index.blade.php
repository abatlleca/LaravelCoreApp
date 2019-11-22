@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4"><b>Tickets</b></div>
                            <div class="col-md-8">
                                @include('adminPanel.tickets.partials.search')
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <p>
                            <a href="{{ route('ad.tickets.create') }}">Create New Ticket</a>
                        </p>

                        @forelse ($tickets as $ticket)
                            @include('adminPanel.tickets.partials.ticket-item', ['item' => $ticket])
                        @empty
                            No Tickets!
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection ('content')
