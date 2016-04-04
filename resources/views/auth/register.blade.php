@extends('layouts.clean')

@section('title', 'Register')

@section('content')
    {!! Form::open(['url' => url('/register')]) !!}

        <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Name']) !!}
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email'] ) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] ) !!}
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password Confirmation'] ) !!}
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-12">
                {!! Form::submit('Register', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
            </div>
        </div>

    {!! Form::close() !!}
@stop