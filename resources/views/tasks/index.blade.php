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
					Select genre to filter
					<ul class="filter">
						@foreach ($tasks as $task)
						<li>
							<a href="/tasks/filter/{{ $task->genre }}"> 
								{{ $task->genre }}
							</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="panel-body">
					Select game
	                <ul id="tasks">
				        @foreach ($tasks as $task)
				            <li>
				            	<a href="tasks/{{ $task->id }}"> 
				            		{{ $task->title }} | {{ $task->genre }}
				            	</a>
				            </li>
				        @endforeach
				    </ul>
				</div>
	        </div>
	    </div>
	</div>
</div>
@endsection