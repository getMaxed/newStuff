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
                </li>
            @endforeach
        </div>

    </main>






@endsection