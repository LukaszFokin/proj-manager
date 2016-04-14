<?php
/**
 * Bloco de Boards 
 * Trabalhando com array antes de definir a modelagem do banco de dados
 * @todo Mudar o formato para objeto quando estiver concluido o db
 */
?>
<div class="box box-warning box-solid box-board item-drag " boardid="{{$board['id']}}">
	<div class="box-header with-border">
    	<h3 class="box-title">{{$board['title']}}</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">Texto referente à {{ $board['title'] }}</div>
</div>

<div id='board{{$board['id']}}' class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">{{ $board['title'] }}</h4>
		</div>
		<div class="modal-body">
			asdasdsdas
		</div>
		<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary">Save changes</button>
		</div>
    </div>
  </div>
</div>