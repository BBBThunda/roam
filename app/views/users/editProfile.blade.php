@extends('layouts.master')

@section('bodyContent')

<h1>Edit Profile</h1>

{{ Form::open([ 'route' => 'users.update' ]) }}

{{-- Email address field. -------------------}}
<ul class="errors">
    @foreach($errors->get('email') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('email', 'Email address') }}
{{ Form::email('email', $user->email, ['autofocus', 'autofocus']) }}

{{-- Display name field. ------------------------}}
<ul class="errors">
    @foreach($errors->get('display_name') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('display_name', 'Display name') }}
{{ Form::text('display_name', $user->display_name) }}

{{-- Password field. ------------------------}}
<ul class="errors">
    @foreach($errors->get('password') as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
{{ Form::label('password', 'Password') }}
{{ Form::password('password') }}

{{-- Password confirmation field. -----------}}
{{ Form::label('password_confirmation', 'Confirm password') }}
{{ Form::password('password_confirmation') }}

{{-- Checkbox to indicate user is a tour guide. ---}}
<fieldset>

    <?php
    $checked = [];
    if ($user->is_guide) {
    $checked['checked'] = 'checked';
    } ?>
    {{ Form::checkbox('is_guide', 1, $checked) }}
    {{ Form::label('is_guide', 'I\'m a Tour Guide',
    ['style' => 'display:inline;']) }}
</fieldset><br />

{{-- Form submit button. --------------------}}
{{ Form::submit('Save') }}

{{ Form::close() }}

@stop
