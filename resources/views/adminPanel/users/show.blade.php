@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> User: {{ $user->name }}</div>

                    <div class="card-body">
                        @if(session()->has('status'))
                            <p style="color: green">
                                {{ session()->get('status') }}
                            </p>
                        @endif
                        <p>Name: {{ $user->name }} </p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Is Active: {{ ($user->isActive == 1) ? 'Yes' : 'No' }}</p>
                        <p>Roles:</p>
                            <ul>
                                @forelse($user->roles as $role)
                                    <li>{{ $role->name }}</li>
                                @empty
                                    No Roles assigned yet
                                @endforelse
                            </ul>
                        <p>Permissions:</p>
                        <ul>
                            @forelse($user->permissions as $perm)
                                <li>{{ $perm->name }}</li>
                            @empty
                                No Permissions assigned yet
                            @endforelse
                        </ul>
                        <p><a href="{{ route('users.edit', ['user' => $user->id]) }}">Edit</a> </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')
