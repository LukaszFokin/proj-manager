@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('projectEdit', $project))

@section('title', 'Projects')

@section('sub-title', "Editing {$project->name}")

@section('content')
    <div class="box">
        {!! BootForm::open(['model' => $project, 'store' => 'projects.store', 'update' => 'projects.update']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    {!! BootForm::text('name', null, $project->name) !!}
                    {!! getStatusSelect('status', $project->status) !!}
                </div>
            </div>
        </div>

        <div class="box-footer">
            {!! BootForm::submit('Save') !!}
        </div>
        {!! BootForm::close() !!}
    </div>
@stop