@extends('layouts.app')
@section('content')

    <main class="container">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>{{ $category->name }}</h1><a style="float:right" href="{{ action('CategoryController@edit', [$category->id]) }}">Edit</a>
            </div>
            <h2 class="text-center"><strong>Recent Blogs on {{ $category->name }}</strong></h2>
            @foreach($category->blog as $blog)
                <h2><a href="{{ action('BlogController@show', [$blog->slug]) }}"> {{ $blog->title }}</a></h2>
            @endforeach
        </div>

    </main>






@endsection