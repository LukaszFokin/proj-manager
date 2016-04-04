@extends('layouts.clean')

@section('title', 'Login')

@section('content')
    {!! Form::open(['url' => url('/login')]) !!}

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

        <div class="row">
            <div class="col-xs-8">
                {!! Form::checkbox('remember') !!} Remember Me
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                {!! Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
            </div>
            <!-- /.col -->
        </div>

        <br />
        <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>

    {!! Form::close() !!}
@stop