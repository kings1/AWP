@extends('layouts.main')


@section('content')

	<h1>Your Items<small>(<a href="{{URL::route('new')}}"> New task </a>)</h1>
	<ul>
		@foreach($items as $item)
			<li>
			{{ Form::open() }}

				<input 
						type="checkbox"
						name="id" 
						onClick="this.form.submit()" 
						{{ $item->done ? 'checked' : ''}}
				/>

				<input type="hidden" name="id" value="{{ $item->id }}" />

				{{ $item->name }}

			{{ Form::close() }}
			</li>
		@endforeach
	</ul>
@stop