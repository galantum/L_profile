@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <!-- <div class="panel-body">
                    You are logged in!
                </div> -->
                <div class="panel-body">
                    {{ Form::model($user, array('method' => 'put', 'route' => array('update', $user->id))) }}
                        <ul>
                            <li>
                                {{ Form::label('name', 'Name:') }}
                                {{ Form::text('name') }}
                            </li>
                            <li>
                                {{ Form::label('email', 'Email:') }}
                                {{ Form::text('email') }}
                            </li>
                            <li>
                                {{ Form::label('password', 'Password:') }}
                                {{ Form::password('password') }}
                            </li>
                            <li>
                                {{ Form::label('password_confirmation', 'Confirm Password:') }}
                                {{ Form::password('password_confirmation') }}
                            </li>
                            <li>
                                {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
                                {{ link_to_route('home', 'Cancel', $user->id, array('class' => 'btn btn-info')) }}
                            </li>
                        </ul>
                    {{ Form::close() }}
                    @if ($errors->any())
					    <ul>
					        {{ implode('', $errors->all(':message')) }}
					    </ul>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection