@extends('layouts.main')


@section('content')

	<h1 class="list">Your Items 
		<small>
			|<a href="{{ URL::route('new') }}"> +</a>
		</small>
	</h1>
	
	<ul>
		@foreach($items as $item)
			<li>
			{{ Form::open() }}
				<input type="checkbox" onclick="document.form.submit()" {{ $item->done ? 'checked' : ''}} />

				<input type="hidden" name="id" value="{{ $item->id }}" />

				{{ e($item->name) }} <s><a href="{{ URL::route('delete', $item->id) }}"> <button type="button" class="btn btn-primary btnSize">Delete</button> </a></s>
			{{ Form::close() }}
			</li>
		@endforeach
	</ul>

@stop