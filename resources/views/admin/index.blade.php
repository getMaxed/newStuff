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
                <button class="btn btn-danger link"><a style="color: #fff;" href="{{ url('/media') }}">Featured Images</a></button>
            </div>
        </div>

        <br>

        <div class="col-sm-12">
            <h1 class="page-header">Recent Blogs</h1>
            <div class="table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Blog Title</th>
                            <th>Blog Content</th>
                            <th>Status</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blog as $blog)
                            <tr>
                                <th>{{ $blog->title }}</th>
                                <th>{!! str_limit($blog->body, 100) !!}</th>
                                <th>{{ $blog->status == 0 ? 'Draft' : 'Published' }}</th>
                                <td>
                                    {{ Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@publish', $blog->id]]) }}
                                        {{ Form::submit('Publish', ['class' => 'btn btn-success']) }}
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