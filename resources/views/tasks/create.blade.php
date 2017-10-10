@extends('layouts.app')

@section('content')
	<form method="POST" action="/tasks">
		{{ csrf_field() }}
		<input type="text" name="title" id="title" placeholder="title">
		<textarea id="body" name="body" placeholder="body text"></textarea>

		<input type="submit" name="submit">

	</form>

	@include('errors')

@endsection