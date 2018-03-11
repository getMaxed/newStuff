@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Hello {{ Auth::user()->name }}</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                <button class="btn btn-primary link"><a style="color: #fff;" href="{{ url('/blog/create') }}">Create Blog</a></button>
                <button class="btn btn-danger link"><a style="color: #333;" href="{{ url('/categories/create') }}">Categories</a></button>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-header">Latest Blogs</h1>
                    @if ($user = Auth::user())
                        @if ($user->blog)
                            <ul>
                                @foreach ($blog as $blog)
                                    @if ($blog->user_id === $user->id)
                                        <li style="list-style-type:none;">
                                            <button class="btn btn-success btn-xs">{{ $blog->status === 0 ? 'Draft' : 'Published' }}</button>
                                            <a href="{{ action('BlogController@show', [$blog->slug]) }}">{{ $blog->title }}</a>
                                       </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </main>






@endsection