@extends('layouts.loginmain')


@section('content')

<div class="container">
  <div class="row">
		<div class="col-md-5">
		  <h1 class="text-primary center-block largefont"><b>Declutter your mind; think smarter.</b></h1>
		  <p class="lead text-primary"><b>GladiatorNote - a quick way to articulate your daily experiences.</b></p>
		</div>

		<div class="col-md-4 col-md-offset-2 formcontainer">
		  {{ Form::open(/*array('autocomplete' => 'off')*/) }}

				<h3 class="text-primary">Please Login</h3>
				{{--@foreach ($errors->all() as $error)
					<div class="alert alert-danger" role="alert">{{$error}}</div>
				@endforeach--}}

				@if($errors->any())
				<div class="alert alert-danger" role="alert">
					{{implode('', $errors->all('<li>:message</li>'))}}
				</div>
				@endif
				
				<div class="form-group form-group-lg">
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>

				<div class="form-group form-group-lg">
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				
				<div class="btn-group btn-group-lg" role="group">
					<button type="submit" name="submit" class="btn btn-success btn-lg">Login</button>
					<button type="button" class="btn btn-primary btn-lg" onClick="location.href='{{URL::route("signup")}}'">Sign Up</button>
				</div>

		  {{ Form::close() }}
		</div>
	</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>

</html>

@stop