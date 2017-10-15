@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-default">
	            <div class="panel-heading">Create new game:</div>

				<div class="panel-body">
					@include('errors')
					
					<form method="POST" action="/tasks">
						{{ csrf_field() }}
						<div class="form-group">
				            <label for="title">Title:</label>
							<input type="text" name="title" id="title" placeholder="title"   class="form-control" required>
						</div>
						<div class="form-group">
				            <label for="title">Title:</label>
							<textarea id="body" name="body" placeholder="body text" class="form-control" required></textarea>
						</div>

						<input type="submit" name="submit" class="btn btn-default">

					</form>
	            </div>
	        </div>
	    </div>
	</div>
</div>

@endsection