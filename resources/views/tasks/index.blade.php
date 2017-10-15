@extends('layouts.app')

@section('content')
    

<div class="container">
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-default">
	            <div class="panel-heading">All games</div>
	            <div class="panel-body">
	            	@if($errors->any())
	            	<div class="alert alert-danger">
        				<ul>
							<li>{{$errors->first()}}</li>
						</ul>
					</div>
					@endif

					@if(session('status'))
	            	<div class="alert alert-success">
        				<ul>
							<li>{{ session('status') }}</li>
						</ul>
					</div>
					@endif
	                <ul>
				        @foreach ($tasks as $task)
				            <li>
				            	@guest
				            	<a href="tasks/{{ $task->id }}"> 
				            		{{ $task->title }}
				            	</a>
				            	@else
					            	@if(Auth::user())
						            	<form action="/tasks/delete/{{$task->id}}" method="POST">
								        	{{csrf_field()}}
								        	{{ method_field('DELETE') }}
								        	<a href="tasks/{{ $task->id }}"> 
							            		{{ $task->title }}
							            	</a>
								        	<button type="submit" class="btn btn-default deletebutton">Delete</button>
								        </form>
							        @endif
						        @endguest
				            </li>
				        @endforeach
				    </ul>
				</div>
	        </div>
	    </div>
	</div>
</div>

@endsection