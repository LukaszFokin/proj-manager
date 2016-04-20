@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('phases'))

@section('title', 'Project Label')

@section('sub-title', 'Management')

@section('content')
    <div class="box">
        <div class="box-body">
            {{ BootForm::inline(['route' => 'project_labels.index', 'method' => 'GET']) }}
                <div class="form-group">
                    {!! BootForm::text('name', null, Input::get('name')) !!}
                    {!! getProjectsSelect('project_id', 'Project', Input::get('project_id')) !!}
                </div>
                {!! BootForm::submit('Search', ['style' => 'margin-top:20px;']) !!}
            {{ BootForm::close() }}
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <p class="pull-right">
                <a href="{{ route('project_labels.create') }}" class="btn btn-warning btn-md">
                    <i class="fa fa-tags"></i> Add new phase
                </a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Color</th>
                <th>Project</th>
                <th class="col-lg-1">Actions</th>
                </thead>
                <tbody>
                @foreach($project_labels as $project_label)
                    <tr>
                        <th scope="row">{{ $project_label->id }}</th>
                        <td>{{ $project_label->name }}</td>
                        <td>{{ $project_label->color }}</td>
                        <td>{{ $project_label->project->name }}</td>
                        <td>
                            @if (!isDeleted($project_label->status))
                                <a href="{{ route('project_labels.edit', [$project_label->id]) }}" class="btn btn-info btn-xs">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-xs delete-id" data-id="{{ $project_label->id }}" data-toggle="modal" data-target=".delete-modal">
                                    <i class="glyphicon glyphicon glyphicon-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {!! $project_labels->appends(Input::get())->render() !!}
            </div>
        </div>
    </div>

    @include('_partials.delete_modal', [
        'modalUrl' => url('project_labels'),
        'modalName' => 'delete-modal',
        'modalTitle' => 'Delete Label',
        'modalMessage' => '<p>Are you sure you want to delete this label?</p><p>This operation can not be undone</p>',
        'deleteButton' => '.delete-id',
        'deleteID' => 'data-id'
    ])
@stop