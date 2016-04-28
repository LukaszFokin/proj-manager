@extends('layouts.master')

@section('title', 'Scrum boards')

{{Html::style('css/boards.css')}}
{{Html::style('css/bootstrap-horizon.css')}}

@section('body-class', 'fixed sidebar-collapse')

@section('content')

<div class="board-phases row-horizon">
    @each('boards.phases', $task_status, 'status')
</div>

@endsection

@section('page-script')
<script>
$(document).ready(function() {
    $('.box-board').dblclick(function() {
  		$('#board'+$(this).attr('id')).modal()
	});
	$('.board-phase-column').sortable(
		{
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
		}
	);
});
</script>
@stop


