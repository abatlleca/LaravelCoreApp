@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Users List</b>
                    </div>

                    <div class="card-body">
                        <p>
                            <a href="{{ route('register') }}">Create New User</a>
                        </p>
                        @forelse ($users as $user)
                            <p>
                            <a href="{{ route('users.show', ['user' => $user->id]) }}"> {{ $user->name }} </a>
                            </p>
                        @empty
                            No Users!
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection ('content')
