<?php
/**
 * rendeiza as colunas da ferramenta de projetos
 * 
 * @param 	obj 			array com as fases do projeto 
 * @author 	Fabrica Hitss
 * 
 */ 
?>
<div class="board-phase-list">
	<div class="board-phase-list-content col-sm-12" id="{{$status->id}}">
		<div class="board-phase-list-header">
			<h4>{{$status->name}}</h4>
		</div>

		<div class="board-phase-column">
			@each('boards.board',$status->tasks->all(), 'board')
		</div>
	</div>
</div>