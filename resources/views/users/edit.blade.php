@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Edit User: {{ $user->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                            @csrf
                            @method('PUT')

                            @include('users._form')

                            <button type="submit">Edit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')
