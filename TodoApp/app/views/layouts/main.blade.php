<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Todo App</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	{{-- Asset returns the path to public folde --}}
</head>
<body>
	<div class="container">
		@yield('content')
		{{-- Print out whatever is b/w section() & stop() tags wherever layouts.main is called. --}}
	</div>
</body>
</html>