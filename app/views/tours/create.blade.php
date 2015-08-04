@extends('layouts.master')

@section('bodyContent')

{{ Form::open([ 'route' => 'tours.store' ]) }}

{{-- Tour name field. -------------------}}
<ul class="errors">
    @foreach($errors->get('name') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{-- Form::label('name', 'Tour Name') --}}
{{ Form::text('name', '', ['autofocus' => 'autofocus',
'placeholder' => 'Tour Name']) }}

{{-- Description field. -----------------}}
<ul class="errors">
    @foreach($errors->get('description') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{-- Form::label('description', 'Tour Description') --}}
{{ Form::textarea('description', '', [
'placeholder' => 'Describe this tour.']) }}

{{-- TODO: ADD DATE/TIME PICKER --}}

{{-- Start date field. -----------------}}
<ul class="errors">
    @foreach($errors->get('start_date') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('start_date', 'Start Date') }}
{{ Form::text('start_date', $data['defaultStartDate'], array(
'placeholder' => 'MM/DD/YYYY'
)) }}

{{-- Start time field. -----------------}}
<ul class="errors">
    @foreach($errors->get('start_time') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('start_time', 'Start Time') }}
{{ Form::text('start_time', $data['defaultStartTime'], array(
'placeholder' => 'HH:MM am'
)) }}

{{-- End date field. -----------------}}
<ul class="errors">
    @foreach($errors->get('end_date') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('end_date', 'End Date') }}
{{ Form::text('end_date', $data['defaultEndDate'], array(
'placeholder' => 'MM/DD/YYYY'
)) }}

{{-- End time field. -----------------}}
<ul class="errors">
    @foreach($errors->get('end_time') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('end_time', 'End Time') }}
{{ Form::text('end_time', $data['defaultEndTime'], array(
'placeholder' => 'HH:MM am'
)) }}

{{ Form::label('tour_type_id', 'Type') }}
{{Form::select('tour_type_id', array(
1 => 'Bars',
2 => 'History',
3 => 'Tech',
4 => 'Food',
5 => 'Architecture',
6 => 'City Murals'
))}}

{{-- Price field. -----------------}}
<ul class="errors">
    @foreach($errors->get('price') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('price', 'Price') }}
{{ Form::text('price', '', array(
'placeholder' => 'Price (USD)'
)) }}

{{-- Form submit button. --------------------}}
{{ Form::submit('Create', array('class' => 'btn btn-lg btn-info btn-block')) }}

{{ Form::close() }}

@stop
