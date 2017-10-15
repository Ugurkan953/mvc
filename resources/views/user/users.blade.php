@extends('layouts.app')

@section('content')
    

<div class="container">
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-default">
	            <div class="panel-heading">All games</div>
	            <div class="panel-body">
	                <ul>
				        @foreach ($user as $oUser)
				            <li>
				            	<form action="/users/delete/{{$oUser->id}}" method="POST">
						        	{{csrf_field()}}
						        	{{ method_field('DELETE') }}
						        	{{ $oUser->name }}   	
						        	<button type="submit" class="btn btn-default deletebutton">Delete</button>
						        </form>
				            </li>
				        @endforeach
				    </ul>
				</div>
	        </div>
	    </div>
	</div>
</div>

@endsection