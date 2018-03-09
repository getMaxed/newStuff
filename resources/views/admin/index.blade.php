@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Admin Control Panel</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                <button class="btn btn-primary link"><a style="color: #fff;" href="{{ url('/blog/create') }}">Create Blog</a></button>
                <button class="btn btn-danger link"><a style="color: #fff;" href="{{ url('/blog/bin') }}">Trashed Blogs</a></button>
                <button class="btn btn-success link"><a style="color: #fff;" href="{{ url('/media') }}">Featured Images</a></button>
                <button class="btn btn-primary link"><a style="color: #fff;" href="{{ url('/userslist') }}">Users</a></button>
                <button class="btn btn-danger link"><a style="color: #333;" href="{{ url('/categories/create') }}">Categories</a></button>
            </div>
        </div>

        <br>

        <div class="col-sm-12">
            <h1 class="page-header">Recent Blogs</h1>
            <div class="table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Blog Title</th>
                            <th>Blog Content</th>
                            <th>Action</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blog as $blog)
                            <tr>
                                {{ Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@publish', $blog->id]]) }}

                                @include('partials.error-message')

                                <td>{!! Form::text("title", null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::textarea("body", null, ['class' => 'form-control', 'size' => '20x5']) !!}</td>
                                <td>{!! Form::select("status", ['0' => 'Draft', '1' => 'Published'], null, ['class' => 'btn btn-primary'])  !!} </td>
                                <td>{{ Form::submit('Submit', ['class' => 'btn btn-success btn-xs']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>






@endsection