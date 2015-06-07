@extends('layouts.master')

@section('bodyContent')

{{ Form::open([ 'route' => 'tours.store' ]) }}

{{-- Email address field. -------------------}}
<ul class="errors">
    @foreach($errors->get('email') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('name', 'Tour Name') }}
{{ Form::text('name', '', ['autofocus', 'autofocus']) }}

{{-- Display name field. ------------------------}}
<ul class="errors">
    @foreach($errors->get('display_name') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('description', 'Tour Description') }}
{{ Form::textarea('description') }}

{{ Form::label('start_time', 'Start Time') }}
{{ Form::text('start_time') }}

{{ Form::label('end_time', 'End Time') }}
{{ Form::text('end_time') }}

{{ Form::label('tour_type_id', 'Tour Type Id') }}
{{Form::select('tour_type_id', array(
1 => 'Bars',
2 => 'History',
3 => 'Tech',
4 => 'Food',
5 => 'Architecture',
6 => 'City Murals'
))}}



{{-- Form submit button. --------------------}}
{{ Form::submit('Create') }}

{{ Form::close() }}

<p>Already have an account? <a href="/login">Log In</a></p>

@stop
