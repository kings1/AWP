@extends('layouts.main')



@section('content')

	<h1>Your Items</h1>
	<ul>
		@foreach($items as $item)
			<li>
			{{ Form::open() }}

				<input type="checkbox" onClick="this.form.submit()" {{ $item->done ? 'checked' : ''}}/>

				<input type="hidden" name="id" value="{{ $item->id }}" />

				{{ $item->name }}

			{{ Form::close() }}
			</li>
		@endforeach
	</ul>
@stop