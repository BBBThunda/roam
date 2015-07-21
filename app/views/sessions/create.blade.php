@extends('layouts.master')

@section('bodyContent')

@if ($errors)
<?php //dd($errors); ?>
@endif
<style type="text/css">
    .form-signin
    {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading, .form-signin .checkbox
    {
        margin-bottom: 10px;
    }
    .form-signin .checkbox
    {
        font-weight: normal;
    }
    .form-signin .form-control
    {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .form-signin .form-control:focus
    {
        z-index: 2;
    }
    .form-signin input[type="text"]
    {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"]
    {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .account-wall
    {
        margin-top: 10px;
        padding: 10px 0px 10px 0px;
        background-color: #f7f7f7;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }
    .login-title
    {
        color: #555;
        font-size: 18px;
        font-weight: 400;
        display: block;
    }
    .profile-img
    {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }
    .need-help
    {
        margin-top: 10px;
    }
    .new-account
    {
        display: block;
        margin-top: 10px;
    }
</style>


<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
        <h2 class="text-center login-title">Log In</h2>

        {{-- Email field. -----------------}}
        <ul class="errors">
            @foreach($errors->get('email') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        {{-- Password field. -----------------}}
        <ul class="errors">
            @foreach($errors->get('password') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>

        {{ Form::open(array('route' => 'sessions.store',
        'class' => 'form-horizontal form-signin',
        'role' => 'form')) }}

        <div class="form-group">
            {{ Form::text('email', '', array(
            'class' => 'input-lg form-control',
            'placeholder' => 'Email',
            'autofocus' => 'autofocus'
            )) }}
        </div>

        <div class="form-group">
            {{ Form::password('password', array(
            'class' => 'input-lg form-control',
            'placeholder' => 'Password'
            )) }}
        </div>


        <div class="form-group checkbox pull-left">
            {{ Form::checkbox('remember', 1, array(
            )) }}
            {{ Form::label('remember', 'Remember me:') }}
        </div>

        <div class="form-group">
            {{ Form::submit('Login', array('class' => 'btn btn-lg btn-info btn-block')) }}
        </div>

        {{ Form::close() }}
    </div>
</div> <!-- end row -->

@stop
