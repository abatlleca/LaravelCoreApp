@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Permission: {{ $permission->name }}</div>

                    <div class="card-body">
                        @if(session()->has('status'))
                            <p style="color: green">
                                {{ session()->get('status') }}
                            </p>
                        @endif
                        <p>Name: {{ $permission->name }} </p>
                        <p><a href="{{ route('permissions.edit', ['permission' => $permission->id]) }}">Edit</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')
