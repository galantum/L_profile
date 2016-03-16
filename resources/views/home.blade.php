@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                            <tr>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ Auth::user()->email }}</td>
                                
                                <td>{{ link_to_route('edit', 'Edit', array(Auth::user()->id), array('class' => 'btn btn-info')) }}</td>
                            </tr>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
