@extends ('layout')

@section('content')
    <ul>
        @foreach ($tasks as $task)

            <li>{{ $task->body }}</li>
        @endforeach
    </ul>

    <form method="POST" action="/tasks">
    	{{ csrf_field() }}
    	<input type="text" name="title" id="title">
    	<textarea id="body" name="body"></textarea>

    	<input type="submit" name="submit">

    </form>
@endsection