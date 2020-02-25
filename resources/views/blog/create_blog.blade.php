@extends('layouts.app')

@section('content')

<form action="/blogs/create" method="POST">
    @method('PUT')

    <div class="col-8 justify-content-center">

        <input name="title" class="form-control form-control-lg" type="text" placeholder="Title">

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Body"></textarea>
        </div>

        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
        
    </div>
</form>

@endsection
