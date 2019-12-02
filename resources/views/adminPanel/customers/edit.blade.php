@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Edit Customer: {{ $customer->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('customers.update', ['customer' => $customer->id]) }}">
                            @csrf
                            @method('PUT')

                            @include('adminPanel.customers._form')

                            <div class="form-group row d-flex justify-content-center">
                                <div class="col-md-auto ">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection ('content')
