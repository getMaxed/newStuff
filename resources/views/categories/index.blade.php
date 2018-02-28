@extends('layouts.app')
@section('content')

    <main class="container">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Blog Categories</h1>
            </div>
            @foreach($categories as $category)
                {{--<li>{{ $category->name }}</li>--}}
                @if ($category->blog->count() > 0)
                    <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                @endif
            @endforeach
        </div>

    </main>






@endsection