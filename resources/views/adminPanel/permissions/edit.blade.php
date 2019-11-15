@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Edit Permission: {{ $permission->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('permissions.update', ['permission' => $permission->id]) }}">
                            @csrf
                            @method('PUT')

                            @include('adminPanel.permissions._form')

                            <button type="submit">Edit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')
