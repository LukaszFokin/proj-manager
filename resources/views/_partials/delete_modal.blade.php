<!-- Model for delete an user -->
{!! Form::open(array('method' => 'DELETE', 'url' => $modalUrl, 'name' => $modalName)) !!}
<div class="modal fade {{ $modalName }}" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ $modalTitle }}</h4>
            </div>
            <div class="modal-body">
                {!! $modalMessage !!}
            </div>
            <div class="modal-footer">
                {{ Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@section('page-script')
<script>
    $(document).ready(function() {
        $('{!! $deleteButton !!}').click(function() {
            var form = $('form[name={!! $modalName !!}]');
            form.attr('action', '{!! $modalUrl !!}' + '/' + $(this).attr('{!! $deleteID !!}'));
        });
    });
</script>

@stop