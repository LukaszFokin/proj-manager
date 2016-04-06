@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('users'))

@section('title', 'Users')

@section('sub-title', 'Management')

@section('content')
    <div class="box">
        <div class="box-body">
            busca
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{!! getStatusBox($user->status) !!}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop