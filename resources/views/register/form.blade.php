@extends('layouts.clean')

@section('title', 'Register')

@section('content')
    {!! Form::open(['url' => '/register/save']) !!}
        <div class="form-group has-feedback">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email'] ) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] ) !!}
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password Confirmation'] ) !!}
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
        </div>
    {!! Form::close() !!}

@stop