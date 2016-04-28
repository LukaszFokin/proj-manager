<?php
/**
 * Bloco de Boards 
 * Trabalhando com array antes de definir a modelagem do banco de dados
 * @todo Mudar o formato para objeto quando estiver concluido o db
 */
?>
<div class="box box-solid box-board item-drag" id="{{$board->id}}">
	<div class="box-header with-border">
    	<span class="box-title">#{{ $board->id }} - {{ $board->name }}</span>
	</div>
</div>

<div id='board{{$board->id}}' class="modal fade bs-example-modal-lg board-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">{{$board->name}}</h4>
	        <h5 class="modal-title" id="exampleModalLabel">{{$board->description}}</h5>
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
					<div class="row">
						<div class="col-md-5">
							Aqui os membros
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h4>Informações do andamento da atividade</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 comments box-footer">
				              <form action="" method="post">
				                <div class="pull-left image">
					                @if(Auth::user()->image)
					                    {{ Html::image(asset("img/users/".Auth::user()->image), Auth::user()->name, ['class' => 'img-circle']) }}
					                @endif
				                </div>
				                <div class="img-push">
				                  <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
				                </div>
				              </form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							@include('boards.timeline')
						</div>
					</div>
				</div>
				<div class="col-md-2">
					@include('boards.actions')
				</div>
			</div>
		</div>
		<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
    </div>
  </div>
</div>


