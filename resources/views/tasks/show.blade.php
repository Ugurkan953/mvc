@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-default">
	            <div class="panel-heading">{{ $task->title }} | {{ $task->genre }}</div>

	            <div class="panel-body">
	                {{ $task->body }}
	            </div>
	            <div class="panel-body">
	                <ul>
						@foreach($task->comments as $comment)
							<li>
								{{ $comment->created_at->toFormattedDateString() }}
								{{ $comment->body }} | from
								{{ $comment->user->name }}

							</li>
						@endforeach
					</ul>
				</div>
				@if(Auth::user())
				<div class="panel-body">
					@include('errors')
					@if(count(Auth::user()->posts))
					<form method="POST" action="/tasks/{{ $task->id }}/comments/">
						{{ csrf_field() }}
						<div class="form-group">
                            <label for="body">Comment:</label>
                          	<textarea id="body" name="body"  class="form-control" required></textarea>
                        </div>
						
						<input type="submit" name="submit" class="btn btn-default">
					</form>
					@else
					<div class="alert alert-danger">
        				<ul>
        					<li>You must create your own post, before you can start commenting on other posts.</li>
        				</ul>
        			</div>
					@endif
	            </div>
		            @if($task->user_id == Auth::user()->id || Auth::user()->role == 1)
		            <div class="panel-body">
		            	<form action="/tasks/delete/{{$task->id}}" method="POST">
				        	{{csrf_field()}}
				        	{{ method_field('DELETE') }}
				        	<a href="tasks/{{ $task->id }}"> 
			            		{{ $task->title }} | {{ $task->genre }}
			            	</a>
				        	<button type="submit" class="btn btn-default deletebutton">Delete</button>
				        </form>
		            </div>
		            @endif
	            @endif

	        </div>
	    </div>
	</div>
</div>

@endsection

