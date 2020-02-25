@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <!-- <a type="button" class="mt-5 btn btn-lg btn-dark " href="{{route('blogs.index')}}">Your feed</a> -->
            </div>
        </div>
    </div>
</div>
@endsection
