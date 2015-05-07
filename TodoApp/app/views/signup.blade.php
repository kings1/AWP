@extends('layouts.loginmain')


@section('content')

<div class="container">
  <div class="row">
		<div class="col-md-5">
		  <h1 class="text-primary center-block largefont"><b>Declutter your mind; think smarter.</b></h1>
		  <p class="lead text-primary"><b>GladiatorNote - a quick way to articulate your daily experiences.</b></p>
		</div>

		<div class="col-md-4 col-md-offset-2 formcontainer">
		  {{ Form::open() }}
				<h3 class="text-primary">Please Sign Up</h3>

				@if($errors->any())
				<div class="alert alert-danger" role="alert">
					{{implode('', $errors->all('<li>:message</li>'))}}
				</div>
				@endif
				
				<div class="form-group form-group-lg">
					{{-- <input type="text" class="form-control" name="username" placeholder="Username"> --}}
					{{ Form::text('name', '', array('placeholder' => 'Username', 'class' => 'form-control'))}}
				</div>

				<div class="form-group form-group-lg">
					<input type="email" class="form-control" name="email" id="email" placeholder="Email">
				</div>

				<div class="form-group form-group-lg">
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				
				<button type="submit" name="submit" class="btn btn-success btn-lg">Sign Up</button>

				<button type="button" name="submit" class="btn btn-primary btn-lg" onClick="location.href='{{URL::route("login")}}'">Cancel</button>

		  {{ Form::close() }}
		</div>
	</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>

</html>

@stop