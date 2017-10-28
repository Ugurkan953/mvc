@extends('layouts.app')

@section('content')
    

<div class="container">
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-default">
	            <div class="panel-heading">All Filtered games</div>
	            <div class="panel-body">
	            	<ul id="tasks">
				        @foreach ($fTasks as $task)
				            <li>
				            	<a href="/tasks/{{ $task->id }}"> 
				            		{{ $task->title }} | {{ $task->genre }}
				            	</a>
				            </li>
				        @endforeach
				    </ul>
	            </div>
				<div class="panel-body">
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
	        </div>
	    </div>
	</div>
</div>
@endsection