<li class="list-group-item activity-group">
    <div class="col-xs-11">
        {!! Form::text('activities[]', $activity, ['class' => 'form-control input-sm']) !!}
    </div>
    <button type="button" class="btn btn-sm btn-danger btn-del-activity">
        <i class="fa fa-lg fa-minus-circle"></i>
    </button>
</li>