@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Hello {{ Auth::user()->name }}</h1>
            </div>

        <br>

        <div class="col-sm-12">
            <h1 class="page-header">Profile</h1>
        </div>

    </main>






@endsection