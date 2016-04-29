@extends('layouts.master')

@section('title', 'Scrum boards')

{{Html::style('css/boards.css')}}
{{Html::style('css/bootstrap-horizon.css')}}

@section('body-class', 'fixed sidebar-collapse')

@section('content')

<div class="board-phases row-horizon">
    @each('boards.phases', $taskStatus, 'taskStatus')
</div>

@endsection

@section('page-script')
<script>
$(document).ready(function() {
    // Function to open board modal details
    $('.box-board').dblclick(function() {
  		$('#board'+$(this).attr('id')).modal()
	});

    // Boards column sortable
	$('.board-phase-column').sortable({
        connectWith: '.board-phase-column',
        scroll : false,
        placeholder: 'board-placeholder ui-corner-all',
        start: function(event, ui) {
            wscrolltop = $(window).scrollTop();
            ui.placeholder.height(ui.item.height());
        },
        sort: function(event, ui) {
            ui.helper.css({'top' : ui.position.top + wscrolltop + 'px'});
        },
        update:function(event,ui) {
            if(ui.sender){
                var task_id = ui.item.attr("id");
                var task_new_status = $(this).parent().attr("id");
                $.ajax({
                    type: 'POST',
                    url: '{{ url('boards/changestatus') }}',
                    data: {_token: '{{ csrf_token() }}', task_id: task_id,task_new_status: task_new_status },
                    success: function(data) {
                        console.log(data);
                    },
                });
            }
        }
    });

    // Attributes task_status_id on new task modal form
    $('#modal-new-board').on('show.bs.modal', function(e) {
        $(this).find('input[name="task_status_id"]').val($(e.relatedTarget).data('id'));
    });

    // Add new task function
    $('#btn-add-task').click(function(){
        var form = $('form[name="add-task"]');
        var button = $(this);
        var task_status_id = $('input[name="task_status_id"]').val();
        var column = $('#board-phase-column-'+task_status_id);

        form.find('.form-group').removeClass('has-error');
        form.find('.help-block').html('');

        button.button('loading');

        $.ajax({
            type: 'POST',
            url: '{{ route('tasks.store') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: $('input[name="id"]').val(),
                name: $('input[name="name"]').val(),
                description: $('input[name="description"]').text(),
                task_status_id: task_status_id
            },
            success: function(data) {
                $('#modal-new-board').modal('hide');
                column.append(data);
            },
            error: function(data) {
                var span = $('<span></span>').addClass('help-block');

                $.each(data.responseJSON, function(input, error) {
                    var div = $('input[name="'+input+'"]').closest('.form-group');
                    div.addClass('has-error');
                    div.append(span.html(error));
                });
            },
            complete: function() {
                button.button('reset');
            },
        });
    });
});
</script>
@stop


