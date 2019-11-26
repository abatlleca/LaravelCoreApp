@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Create Ticket: </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('ad.tickets.store') }}">
                            @csrf
                            @include('adminPanel.tickets._form')
                            <button type="submit">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')
