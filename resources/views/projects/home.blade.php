@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('projects'))

@section('title', 'Projects')

@section('sub-title', 'Management')

@section('content')
    <div class="box">
        <div class="box-body">
            <p class="pull-right">
                <a href="{{ route('projects.create') }}" class="btn btn-warning btn-md">
                    <i class="glyphicon glyphicon-briefcase"></i>
                    Add new project
                </a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th class="col-lg-1">Actions</th>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->name }}</td>
                        <td>{!! getStatusBox($project->status) !!}</td>
                        <td>
                            @if (!isDeleted($project->status))
                                <a href="{{ route('projects.edit', [$project->id]) }}" class="btn btn-info btn-xs">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-xs delete-user" data-user="{{ $project->id }}" data-toggle="modal" data-target=".delete-modal">
                                    <i class="glyphicon glyphicon glyphicon-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {!! $projects->render() !!}
            </div>
        </div>
    </div>

    @include('_partials.delete_modal', [
        'modalUrl' => url('projects'),
        'modalName' => 'delete-modal',
        'modalTitle' => 'Delete Project',
        'modalMessage' => '<p>Are you sure you want to delete this project?</p><p>This operation can not be undone</p>',
        'deleteButton' => '.delete-user',
        'deleteID' => 'data-user'
    ])
@stop