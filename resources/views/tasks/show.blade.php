@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-default">
	            <div class="panel-heading">{{ $task->title }}</div>

	            <div class="panel-body">
	                {{ $task->body }}
	            </div>
	            <div class="panel-body">
	                <ul>
						@foreach($task->comments as $comment)
							<li>
								{{ $comment->created_at->toFormattedDateString() }}
								{{ $comment->body }}
							</li>
						@endforeach
					</ul>
				</div>
				@if(Auth::user())
				<div class="panel-body">
					@include('errors')
					
					<form method="POST" action="/tasks/{{ $task->id }}/comments/">
						{{ csrf_field() }}
						<div class="form-group">
                            <label for="body">Comment:</label>
                          	<textarea id="body" name="body"  class="form-control" required></textarea>
                        </div>
						
						<input type="submit" name="submit" class="btn btn-default">
					</form>
	            </div>
	            @endif
	        </div>
	    </div>
	</div>
</div>

@endsection

