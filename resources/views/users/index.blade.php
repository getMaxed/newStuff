@extends('layouts.app')
@section('content')

    <main class="container-fluid">

        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Users on newStuff</h1>
            </div>

        <br>

        <div class="col-sm-12">
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
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
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>






@endsection