@extends('layouts.app')
@section('content')

    <main class="container">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Create a Blog Post</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                {!! Form::open(['url' => 'foo/bar']) !!}
                    //
                {!! Form::close() !!}
            </div>
        </div>

    </main>






@endsection