@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>{{ $user->name }}</h1>
            </div>

            <br>

            <div class="col-sm-12">
                <h1 class="page-header">Latest Blogs</h1>
                {{ $user->blog }}
            </div>
        </div>
    </main>






@endsection