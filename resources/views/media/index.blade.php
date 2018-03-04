@extends('layouts.app')
@section('content')

    <main class="container">

        <div class="container-fluid img-container">
            <div class="jumbotron">
                <h1>Featured Images</h1>
            </div>
            @foreach($photos as $photo)
                <li>
                    <img height="100" src="/images/{{ $photo->photo }}" alt="">
                    {{ Form::open(['method' => 'DELETE', 'action' => ['PhotosController@destroy', $photo->id]]) }}
                        {!! Form::submit('Delete Photo', ['class' => 'btn btn-danger']) !!}
                    {{ Form::close() }}}
                </li>
            @endforeach
        </div>

    </main>






@endsection