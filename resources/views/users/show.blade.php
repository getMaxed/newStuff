@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="jumbotron">
                <div class="col-sm-8">
                    <h1>Hello {{ $user->name }}</h1>
                </div>
                <div class="col-sm-4">
                    <img class="img-circle" height="100" width="100" src="/images/{{ $user->photo ? $user->photo->photo : 'default.png' }}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
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
                <div class="col-sm-6">
                    @if ($user->about)
                        <div class="panel panel-info">
                            <h2>About</h2>
                            <hr>
                            <p>{{ $user->about }}</p>
                        </div>
                    @endif

                    @if ($user->website)
                        <div>
                            <h2>Website</h2>
                            <a href="http://{{ $user->website }}">{{ $user->website }}</a>
                        </div>
                    @endif

                    @if ($user->facebook || $user->twitter || $user->github)
                        <div>
                            <h2>Get Social</h2>
                            <ol class="list-unstyled">
                                @if ($user->facebook)
                                    <li><a href="http://{{ $user->facebook }}">{{ $user->facebook }}</a></li>
                                @endif
                                @if ($user->twitter)
                                    <li><a href="http://{{ $user->twitter }}">{{ $user->twitter }}</a></li>
                                @endif
                                @if ($user->instagram)
                                    <li><a href="http://{{ $user->instagram }}">{{ $user->instagram }}</a></li>
                                @endif
                            </ol>
                        </div>

                    @endif


                </div>
            </div>
        </div>
    </main>






@endsection