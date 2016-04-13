@extends('layouts.master')

@section('breadcrumb', Breadcrumbs::render('phaseEdit', $phase))

@section('title', 'Phases')

@section('sub-title', "Editing {$phase->name}")

@section('content')

    <div class="box">
        {!! BootForm::open(['model' => $phase, 'store' => 'phases.store', 'update' => 'phases.update']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    {!! getProjectsSelect('project_id', 'Project', $phase->project_id) !!}
                    {!! BootForm::text('name', null, $phase->name) !!}
                    {!! getParentPhasesSelect('parent_id', 'Parent Phase', $phase->parent_id) !!}
                    {!! getStatusSelect('status', $phase->status) !!}
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Activities</h3>
                </div>

                <div class="box-body">
                    <div class="form-inline">
                        <div class="form-group">
                            {!! Form::label('Activity') !!}
                            {!! Form::text('new_activity', null, ['class' => 'form-control']) !!}

                            <button type="button" class="btn btn-success btn-add-activity"  data-loading-text="<i class='fa fa-spinner fa-spin '></i>">
                                <i class="fa fa-lg fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>

                    <hr>

                    <ul class="list-group col-lg-6 activities-list">

                    </ul>
                </div>
            </div>
        </div>

        <div class="box-footer">
            {!! BootForm::submit('Save') !!}
        </div>
        {!! BootForm::close() !!}
    </div>
@stop

@section('page-script')
    <script>
        $('.btn-add-activity').click(function() {
            var button = $(this);
            var input = $("input[name='new_activity']");

            button.button('loading');

            $.ajax({
                type: 'POST',
                url: '{{ url('phases/add-activity') }}',
                data: {_token: '{{ csrf_token() }}', new_activity: input.val()},
                success: function(data) {
                    $('.activities-list').append(data);
                    button.closest('.form-group').removeClass('has-error');
                },
                error: function(data) {
                    $.each(data.responseJSON, function(key, value) {
                        button.closest('.form-group').addClass('has-error');
                    });
                },
                complete: function() {
                    button.button('reset');
                    input.val('');
                }
            });
        });

        $('body').on('click', '.btn-del-activity', function(){
            $(this).closest('.activity-group').hide();
        });
    </script>
@stop