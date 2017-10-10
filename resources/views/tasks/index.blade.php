@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($tasks as $task)
            <li>
            	<a href="tasks/{{ $task->id }}"> 
            	{{ $task->title }}
            	</a>
            </li>
        @endforeach
    </ul>

@endsection