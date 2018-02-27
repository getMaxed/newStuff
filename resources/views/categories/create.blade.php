@extends('layouts.app')
@section('content')

    <main class="container">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Create a category</h1>
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                {!! Form::open(['method' => 'POST', 'action' => 'CategoryController@store']) !!}
                <div class="form-group">
                    {!! Form::label("name", "Name:") !!}
                    {!! Form::text("name", null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit("Create a Category", ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </main>






@endsection