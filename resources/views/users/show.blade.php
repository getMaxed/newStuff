@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="jumbotron">
                <div class="col-sm-8">
                    <h1>Hello {{ $user->name }}</h1>
                    <p>{{ $user->role->name }}</p>
                </div>
                <div class="col-sm-4">
                    <br><br>
                    <img class="img-circle" height="100" width="100" src="/images/{{ $user->photo ? $user->photo->photo : 'default.png' }}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <br>
                    <h1 class="page-header">Latest Blogs</h1>
                    <br>
                    @if ($user->blog)
                        <ul>
                            @foreach ($blog as $blog)
                                <li style="list-style-type:none;">
                                    <button class="btn btn-success btn-xs">{{ $blog->status === 0 ? 'Draft' : 'Published' }}</button>
                                    <a href="{{ action('BlogController@show', [$blog->slug]) }}">{{ $blog->title }}</a>
                                </li>
                                <br>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-sm-5">
                    @include('partials.user-sidebar')
                </div>
            </div>
        </div>
    </main>






@endsection