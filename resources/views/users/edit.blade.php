@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="jumbotron">
                        <h1>{{ $user->name }}</h1>
                        <p>Please make changes to make your profile awesome</p>
                    </div>
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                            <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </div>
                    @endif
                </div>
                <div class="col-sm-8 com-sm-offset-2">
                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->username], 'files' => true]) !!}
                    @include('partials.error-message')
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Your name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('about', 'About') !!}
                            {!! Form::textarea('about', null, ['class' => 'form-control', 'placeholder' => 'Your about yourself']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('website', 'Website') !!}
                            {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Paste your website url']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('facebook', 'Facebook') !!}
                            {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Paste your facebook url']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('twitter', 'Twitter') !!}
                            {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'Paste your twitter url']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('instagram', 'Instagram') !!}
                            {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'Paste your instagram url']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('photo_id', 'Profile Picture') !!}
                            {!! Form::file('photo_id') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('get_email', 'Email alert on new Blog') !!}
                            {!! Form::select('get_email', ['1' => 'Yes', '0' => 'No'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit("Update", ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </main>






@endsection