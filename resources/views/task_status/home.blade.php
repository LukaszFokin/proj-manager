@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('taskStatus'))

@section('title', 'Tasks Status')

@section('sub-title', 'Management')

@section('content')
    <div class="box">

    </div>

    <div class="box">
        <div class="box-body">
            <p class="pull-right">
                <a href="{{ route('tasks-status.create') }}" class="btn btn-warning btn-md">
                    <i class="glyphicon glyphicon-bookmark"></i>
                    Add new task status
                </a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Project</th>
                    <th class="col-lg-1">Actions</th>
                </thead>
                <tbody>
                @foreach($taskStatus as $status)
                    <tr>
                        <th scope="row">{{ $status->id }}</th>
                        <td>{{ $status->name }}</td>
                        <td>{{ $status->project->name }}</td>
                        <td>
                            <a href="{{ route('tasks-status.edit', [$status->id]) }}" class="btn btn-info btn-xs">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a class="btn btn-danger btn-xs delete-tasks-status" data-task-status="{{ $status->id }}" data-toggle="modal" data-target=".delete-modal">
                                <i class="glyphicon glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('_partials.delete_modal', [
        'modalUrl' => url('tasks-status'),
        'modalName' => 'delete-modal',
        'modalTitle' => 'Delete Task Status',
        'modalMessage' => '<p>Are you sure you want to delete this task status?</p><p>This operation can not be undone</p>',
        'deleteButton' => '.delete-tasks-status',
        'deleteID' => 'data-task-status'
    ])
@stop