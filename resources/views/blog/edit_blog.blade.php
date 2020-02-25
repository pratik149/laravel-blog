@extends('layouts.app')

@section('content')


@if ( Session::has('flash_message') )
 
  <div class="alert {{ Session::get('flash_type') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
  
@endif
 
@yield('content')

<div class="container">
    <div class="row justify-content-center"></div>
        <div class="col-12">
            <h1 class="display-4">Edit Blog</h1>
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
