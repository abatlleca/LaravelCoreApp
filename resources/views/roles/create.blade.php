@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Create Role: </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf
                            @include('roles._form')
                            <button type="submit">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')