@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Deleted Blog Posts</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                @foreach($deletedBlogs as $blog)
                    <article>
                        <h2>{{ $blog->title }}</h2>
                        <p>{{ $blog->body }}</p>
                    </article>
                @endforeach
            </div>
        </div>

    </main>






@endsection