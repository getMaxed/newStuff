@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Users on newStuff</h1>
            </div>

            <br>

            <div class="col-sm-12">
                @if (Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                        <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                @endif
                <h1 class="page-header">Recent Blogs</h1>
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                            <th>Role</th>
                            <th>Action</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('users.show', $user->username) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    {{ Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) }}
                                    {!! Form::select("role_id", ['1' => 'Administrator', '2' => 'Author', '3' => 'Subscriber'], null, ['class' => 'btn btn-primary']) !!}
                                </td>
                                <td>
                                    {{ Form::submit('Submit', ['class' => 'btn btn-success btn-xs']) }}
                                    {{ Form::close() }}

                                </td>
                                <td>
                                    {{ Form::model($user, ['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id]]) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>






@endsection