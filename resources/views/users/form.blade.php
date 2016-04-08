@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('userEdit', $user))

@section('title', 'Users')

@section('sub-title', "Editing {$user->name}")

@section('content')
    <div class="box">
        {!! BootForm::open(['model' => $user, 'store' => 'users.store', 'update' => 'users.update']); !!}
            <div class="box-body">
                <div class="col-md-6">
                    {!! BootForm::text('name', null, $user->name) !!}
                    {!! BootForm::email('email', null, $user->email) !!}
                    {!! BootForm::password('password') !!}
                    {!! BootForm::password('password_confirmation', 'Password Confirmation') !!}
                    {!! getStatusSelect('status', $user->status) !!}

                    {!! BootForm::submit('Save') !!}
                </div>
            </div>
        {!! BootForm::close() !!}
    </div>
@stop