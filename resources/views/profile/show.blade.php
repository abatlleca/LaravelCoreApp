@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-3">
                                Name:
                            </div>
                            <div class="col-md-9">
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Email:
                            </div>
                            <div class="col-md-9">
                                {{ $user->email }}
                            </div>
                        </div>
                        @if (!empty($user->customer))
                            <div class="row">
                                <div class="col-md-3">
                                    Customer:
                                </div>
                                <div class="col-md-9">
                                    <a href="{{ route('customers.show', ['id' => $user->customer->id]) }}"> {{ $user->customer->name }} </a>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('profile.edit') }}">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
