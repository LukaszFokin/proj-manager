@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('userEdit', $user))

@section('title', 'Users')

@section('sub-title', "Editing {$user->name}")

@section('content')
    <div class="box">
        {!! BootForm::open(['model' => $user, 'store' => 'users.store', 'update' => 'users.update', 'files' => true]) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        {!! BootForm::text('name', null, $user->name) !!}
                        {!! BootForm::email('email', null, $user->email) !!}
                        {!! BootForm::password('password') !!}
                        {!! BootForm::password('password_confirmation', 'Password Confirmation') !!}
                        {!! getStatusSelect('status', $user->status) !!}
                    </div>

                    <div class="col-md-6">
                        @if ($user->image)
                            {!! Html::image(asset("img/users/{$user->image}"), null, ['width' => 200, 'height' => 200, 'class' => 'img-responsive img-circle centered', 'style' => 'margin:5% auto;']) !!}

                        @endif
                        {!! BootForm::file('image') !!}
                    </div>
                </div>
            </div>

            <div class="box-footer">
                    {!! BootForm::submit('Save') !!}
            </div>
        {!! BootForm::close() !!}
    </div>
@stop