@extends('layouts.app')
@section('content')

@include('partials.meta-static')

<main class="container-fluid">

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Latest Blog Posts</h1>
        </div>
        <div class="col-sm-8 col-sm-offset-2">

            @if (Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
            @endif

            @foreach($blogs as $blog)
                <article>
                    <h2><a href="{{ action('BlogController@show', [$blog->id]) }}}">{{ $blog->title }}</a></h2>
                    <p>{{ $blog->body }}</p>
                </article>
            @endforeach
        </div>
    </div>

</main>






@endsection