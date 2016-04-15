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
	        <h5 class="modal-title" id="exampleModalLabel">...</h5>
		</div>
		<div class="modal-body boardcontent">
			<div class="row">
				<div class="progress progress-sm active">
					<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
						<span class="sr-only">50% Complete</span>
                	</div>
              	</div>
			</div>
			<div class="row">
				<div class="col-md-10">	
					<p>Descrição da Tarefa </p>
					<div class="row">
						<div class="col-md-5">
							@include('boards.listmembers')	
						</div>
						<div class="col-md-7">
							
						</div>
						
					</div>
				</div>
				<div class="col-md-2">	
					<div class="row">
						<div class="btn btn-group">
		                  <button type="button" class="btn btn-info">Adicionar</button>
		                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		                    <span class="caret"></span>
		                    <span class="sr-only">Toggle Dropdown</span>
		                  </button>
		                  <ul class="dropdown-menu" role="menu">
		                    <li><a href="#">Membros</a></li>
		                    <li><a href="#">Etiquetas</a></li>
		                    <li><a href="#">Checklist</a></li>
		                    <li class="divider"></li>
		                    <li><a href="#">Anexos</a></li>
		                  </ul>
		                </div>
					</div>
					<div class="row">
						<div class="btn btn-group">
		                  <button type="button" class="btn btn-info">Ações</button>
		                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		                    <span class="caret"></span>
		                    <span class="sr-only">Toggle Dropdown</span>
		                  </button>
		                  <ul class="dropdown-menu" role="menu">
		                    <li><a href="#">Mover</a></li>
		                    <li><a href="#">Copiar</a></li>
		                    <li><a href="#">Assinar</a></li>
		                    <li><a href="#">Arquivar</a></li>
		                  </ul>
		                </div>
					</div>				
				</div>
			</div>
		</div>
		<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary">Save changes</button>
		</div>
    </div>
  </div>
</div>