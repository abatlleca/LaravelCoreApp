@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Roles List</b>
                    </div>

                    <div class="card-body">
                        <p>
                            <a href="{{ route('roles.create') }}">Create New Role</a>
                        </p>
                        @forelse ($roles as $role)
                            <p>
                            <a href="{{ route('roles.show', ['role' => $role->role_name]) }}"> {{ $role->role_name }} </a>
                            </p>
                        @empty
                            No Roles!
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection ('content')
