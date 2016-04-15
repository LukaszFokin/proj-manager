@extends('layouts.master')

@section('title', 'Scrum boards')

{{Html::style('css/boards.css')}}

@section('content')
<div class="box">
	<div class="box-body">	
		<div class="row">
	        <div class="col-md-3"> Todo </div>
	        <div class="col-md-3"> In Progress</div>
	        <div class="col-md-3"> Code Review</div>
	        <div class="col-md-3"> Done</div>
	    </div>
	    <div class="row">
	        <div class="col-md-3 coluna">
	        	@each('boards.board', array(array('id'=>'1','title'=>'Primeira Board'),array('id'=>'2','title'=>'Segunda Board')), 'board')
	        </div>
	        <div class="col-md-3  coluna"></div>
	        <div class="col-md-3  coluna">
	        	@each('boards.board', array(array('id'=>'3','title'=>'Terceira Board')), 'board')
	        </div>
	        <div class="col-md-3  coluna">
	        	@each('boards.board', array(array('id'=>'4','title'=>'Quarta Board')), 'board')
	        </div>
	    </div>
	</div>
</div>


@endsection

@section('page-script')
<script src="{{ asset('//code.jquery.com/ui/1.11.2/jquery-ui.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".box-board").dblclick(function() {
  		$('#board'+$(this).attr('boardid')).modal()
	});
	$(".coluna").sortable(
		{
			connectWith:".coluna",
			start: function(event, ui) {
		        wscrolltop = $(window).scrollTop();
		    },
		    sort: function(event, ui) {                   
		        ui.helper.css({'top' : ui.position.top + wscrolltop + 'px'});
		    }
		}
	);
});
</script>
@stop


