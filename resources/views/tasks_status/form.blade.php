@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('taskStatus', $taskStatus))

@section('title', 'Phases')

@section('sub-title', "{$taskStatus->name}")

@section('content')

    <div class="box">
        {!! BootForm::open(['model' => $taskStatus, 'store' => 'tasks-status.store', 'update' => 'tasks-status.update']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    {!! getProjectsSelect('project_id', 'Project', $taskStatus->project_id) !!}
                    {!! BootForm::text('name', null, $taskStatus->name) !!}
                </div>
            </div>
        </div>

        <div class="box-footer">
            {!! BootForm::submit('Save') !!}
        </div>
        {!! BootForm::close() !!}
    </div>
@stop