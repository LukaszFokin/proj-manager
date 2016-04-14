@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('users'))

@section('title', 'Phases')

@section('sub-title', 'Management')

@section('content')
    <div class="box">
        <div class="box-body">

        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <p class="pull-right">
                <a href="{{ route('phases.create') }}" class="btn btn-warning btn-md">
                    <i class="glyphicon glyphicon-briefcase"></i>
                    Add new phase
                </a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Project</th>
                <th>Parent Phase</th>
                <th>Status</th>
                <th class="col-lg-1">Actions</th>
                </thead>
                <tbody>
                @foreach($phases as $phase)
                    <tr>
                        <th scope="row">{{ $phase->id }}</th>
                        <td>{{ $phase->name }}</td>
                        <td>{{ $phase->project->name }}</td>
                        <td>
                            @if($phase->parentPhase)
                                {{ $phase->parentPhase->name }}
                            @endif
                        </td>
                        <td>{!! getStatusBox($phase->status) !!}</td>
                        <td>
                            @if (!isDeleted($phase->status))
                                <a href="{{ route('phases.edit', [$phase->id]) }}" class="btn btn-info btn-xs">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-xs delete-id" data-id="{{ $phase->id }}" data-toggle="modal" data-target=".delete-modal">
                                    <i class="glyphicon glyphicon glyphicon-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {!! $phases->render() !!}
            </div>
        </div>
    </div>

    @include('_partials.delete_modal', [
        'modalUrl' => url('phases'),
        'modalName' => 'delete-modal',
        'modalTitle' => 'Delete Phase',
        'modalMessage' => '<p>Are you sure you want to delete this user?</p><p>This operation can not be undone</p>',
        'deleteButton' => '.delete-id',
        'deleteID' => 'data-id'
    ])
@stop