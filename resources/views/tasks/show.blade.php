@extends('layouts.app')

@section('content')
	<h1>
		{{ $task->title }}
	</h1>

	<p>
		{{ $task->body }}
	</p>
	<ul>
		@foreach($task->comments as $comment)
			<li>
				{{ $comment->created_at->toFormattedDateString() }}
				{{ $comment->body }}
			</li>
		@endforeach
	</ul>

	@include('errors')

@endsection

@section('contentLoggedIn')

<form method="POST" action="/tasks/{{ $task->id }}/comments/">
	{{ csrf_field() }}
	
	<textarea id="body" name="body"></textarea>

	<input type="submit" name="submit">

</form>

@endsection