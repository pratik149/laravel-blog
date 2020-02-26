@extends('layouts.app')

@section('content')


@if ( Session::has('flash_message') )
 
  <div class="alert {{ Session::get('flash_type') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
  
@endif

@yield('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="display-4 text-center mb-4">Tech Blogs</h2>
            @foreach ($blogs as $blog)
            <div class="card mt-5">

                <div class="card-header">
                    <a href="{{ route('blogs.edit', ['blog'=>$blog->id]) }}" class="btn btn-outline-dark ">Edit</a>
                    {{ $blog->title }}
                    <a href="{{ route('blogs.destroy', ['blog'=>$blog->id]) }}" class="btn btn-outline-danger ">X</a>

                </div>
                <div class="card-body">
                    <p>{{ $blog->body }}</p>
                    <p>Blog published on {{ $blog->created_at }}</p>

                    <form action="{{ route('comments.store', ['blog_id'=>$blog->id]) }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input name="new_comment" type="text" class="form-control" placeholder="Add your comment here" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add Comment</button>
                            </div>
                        </div>
                    </form>

                    <div class="card">
                    <ul class="list-group list-group-flush">
                        @foreach ($blog->comments as $comment)
                        <form action="{{ route('comments.destroy', ['id'=>$comment->id]) }}">
                            @csrf
                            @method('delete')
                            <li class="list-group-item">{{$comment->c_body}} <button type="submit" >X</button> </li>
                        </form>
                        @endforeach
                    </ul>
                    </div>

                </div>
            </div>





            @endforeach

        </div>
    </div>
</div>

@endsection
