@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center"></div>
        <div class="col-12">
            <h1 class="display-4">Edit Blog</h1>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('blogs.update',['blog' => $blog->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- <input name="user_id" value="{{$blog->user_id}}" class="form-control form-control-lg mb-2" type="text" placeholder="User"> -->
                    <input name="title" value="{{$blog->title}}" class="form-control form-control-lg mb-5" type="text" placeholder="Title">
                    <!-- <input name="body" class="form-control form-control-lg" type="text" placeholder="Body"> -->

                    <div class="form-group">
                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="12" placeholder="Body">{{$blog->body}}</textarea>
                    </div>

                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                    
            </form>
        </div>
    </div>
</div>
@endsection
