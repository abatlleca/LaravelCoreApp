@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Edit Menu: {{ $menu->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('menus.update', ['menu' => $menu->id]) }}">
                            @csrf
                            @method('PUT')

                            @include('menus._form')

                            <button type="submit">Edit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')