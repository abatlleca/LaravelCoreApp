@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Access Denied</b></div>

                    <div class="card-body">
                        @if (isset($exception))
                            {{ $exception->getMessage() }}
                        @else
                            You cannot do that action
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
