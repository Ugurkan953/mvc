@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form method="POST" action="/profile/{{Auth::user()->id}}">

                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="name">Your name:</label>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Your password:</label>
                            <input type="password" name="password" id="password" value="{{ Auth::user()->password }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control" required>
                        </div>
                        <input type="submit" name="submit" class="btn btn-default">

                    </form>
                    @include('errors')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
