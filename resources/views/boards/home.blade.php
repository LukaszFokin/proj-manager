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
	        	@each('boards.board', array(array('title'=>'Primeira Board'),array('title'=>'Segunda Board')), 'board')
	        </div>
	        <div class="col-md-3  coluna"></div>
	        <div class="col-md-3  coluna">
	        	@each('boards.board', array(array('title'=>'Terceira Board')), 'board')
	        </div>
	        <div class="col-md-3  coluna">
	        	@each('boards.board', array(array('title'=>'Quarta Board')), 'board')
	        </div>
	    </div>
	</div>
</div>


@endsection

@section('page-script')
<script src="{{ asset('//code.jquery.com/ui/1.11.2/jquery-ui.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".box-board").click(function() {
  		console.log("eu cliquei em uma board!!");
	});
	$(".coluna").sortable(
		{
			connectWith:".coluna",
		}
	);
});
</script>
@stop


