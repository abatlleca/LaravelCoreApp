@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Role: {{ $role->role_name }}</div>

                    <div class="card-body">
                        @if(session()->has('status'))
                            <p style="color: green">
                                {{ session()->get('status') }}
                            </p>
                        @endif
                        <p>Name: {{ $role->role_name }} </p>
                        <p><a href="{{ route('roles.edit', ['role' => $role->role_name]) }}">Edit</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')