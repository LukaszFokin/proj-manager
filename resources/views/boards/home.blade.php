@extends('layouts.master')

@section('title', 'Scrum boards')

{{Html::style('css/boards.css')}}
{{Html::style('css/bootstrap-horizon.css')}}


@section('content')
<div class="box">
	<div class="box-body">	
		<div class="board-phases row-horizon">
	    	@each('boards.phases', 
	    	array(
	    		array('id'=>'1','title'=>'Primeira Board'),
	    		array('id'=>'1','title'=>'Primeira Board'),
	    		array('id'=>'1','title'=>'Primeira Board'),
	    		array('id'=>'1','title'=>'Primeira Board'),
	    		array('id'=>'1','title'=>'Primeira Board'),
	    		array('id'=>'1','title'=>'Primeira Board'),
	    		array('id'=>'2','title'=>'Segunda Board')
	    		), 'phase')
	    </div>
	</div>
</div>

@endsection

@section('page-script')
{{Html::script('js/boards.js')}}
@stop


