@extends('layouts.app')
@section('content')

    <main class="container">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Category</h1>
            </div>
            <div class="col-sm-8">
            <h2>Create</h2>
            <hr>
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
            <div class="col-sm-4">
                <h2>List</h2>
                <hr>
                @foreach($categories as $category)
                    <li style="list-style-type: none"><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></li>
                @endforeach
            </div>

        </div>

    </main>






@endsection