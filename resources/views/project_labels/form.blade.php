@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('phaseEdit', $project_label))

@section('title', 'Project Labels')
{{Html::style('css/bootstrap-colorpicker.min.css')}}

@section('sub-title', "{$project_label->name}")

@section('content')

    <div class="box">
        {!! BootForm::open(['model' => $project_label, 'store' => 'project_labels.store', 'update' => 'project_labels.update']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    {!! getProjectsSelect('project_id', 'Project', $project_label->project_id) !!}
                    {!! BootForm::text('name', null, $project_label->name) !!}
                    <div class="input-group my-colorpicker2 colorpicker-element">
                        {!! BootForm::text('color', null, $project_label->color) !!}

                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
            {!! BootForm::submit('Save') !!}
        </div>
        {!! BootForm::close() !!}
    </div>
@stop
