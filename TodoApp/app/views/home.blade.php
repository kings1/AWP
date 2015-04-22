@extends('layouts.main')


@section('content')

	<h1>Your Items 
		<small>
			(<a href="{{ URL::route('new') }}">New Task</a>)
		</small>
	</h1>
	
	<ul>
		@foreach($items as $item)
			<li>
			{{ Form::open() }}
				<input type="checkbox" onClick="this.form.submit()" {{ $item->done ? 'checked' : ''}} />
				<input type="hidden" name="id" value="{{ $item->id }}" />

				{{ $item->name }} <s>(<a href="{{ URL::route('delete', $item->id) }}"> x </a>)</s>
			{{ Form::close() }}
			</li>
		@endforeach
	</ul>

@stop