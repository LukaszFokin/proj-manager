@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('users'))

@section('title', 'Users')

@section('sub-title', 'Management')

@section('content')
    <div class="box">
        <div class="box-body">
            {{ BootForm::inline(['route' => 'users.index', 'method' => 'GET']) }}
                <div class="form-group">
                    {{ Form::text('search', Input::get('search'), ['class' => 'form-control', 'placeholder' => 'Search']) }}
                </div>
                {!! BootForm::submit('Search') !!}
            {{ BootForm::close() }}
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <p class="pull-right">
                <a href="{{ route('users.create') }}" class="btn btn-warning btn-md">
                    <i class="fa fa-user-plus"></i>
                    Add new user
                </a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="col-lg-1">Actions</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{!! getStatusBox($user->status) !!}</td>
                            <td>
                                @if (!isDeleted($user->status))
                                <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-info btn-xs">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-xs delete-user" data-user="{{ $user->id }}" data-toggle="modal" data-target=".delete-modal">
                                    <i class="glyphicon glyphicon glyphicon-trash"></i>
                                </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {!! $users->appends(Input::get())->render() !!}
            </div>
        </div>
    </div>

    @include('_partials.delete_modal', [
        'modalUrl' => url('users'),
        'modalName' => 'delete-modal',
        'modalTitle' => 'Delete User',
        'modalMessage' => '<p>Are you sure you want to delete this user?</p><p>This operation can not be undone</p>',
        'deleteButton' => '.delete-user',
        'deleteID' => 'data-user'
    ])
@stop