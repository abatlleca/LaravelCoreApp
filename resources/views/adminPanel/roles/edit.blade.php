@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Edit Role: {{ $role->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update', ['role' => $role->id]) }}">
                            @csrf
                            @method('PUT')

                            @include('adminPanel.roles._form')

                            <button type="submit">Edit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')
