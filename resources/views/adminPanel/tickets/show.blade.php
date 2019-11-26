@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8"><b>{{ $ticket->title }}</b></div>
                            <div class="col-md-4 text-right">
                                <a href="{{ route('ad.tickets.edit', ['ticket' => $ticket->id]) }}">Edit</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">ID: {{ $ticket->id }}</div>
                        <div class="row">Customer: {{ $ticket->customer->name }}</div>
                        <div class="row">Origin: {{ $ticket->origin }}</div>
                        <div class="row">Description: {{ $ticket->description }}</div>
                        <p></p>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-4"><b>Actuations: </b></div>
                                            <div class="col-md-8 text-right">
                                                <a href="{{ route('ad.actuations.create', ['ticket_id' => $ticket->id]) }}">Create Actuation</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @forelse($ticket->actuations as $actuation)
                            @include('adminPanel.tickets.partials.actuation-item', ['item' => $actuation])
                        @empty
                            No actuations
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection ('content')
