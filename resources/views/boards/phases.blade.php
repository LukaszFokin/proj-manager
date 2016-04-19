<?php
/**
 * rendeiza as colunas da ferramenta de projetos
 * 
 * @param 	obj 			array com as fases do projeto 
 * @author 	Fabrica Hitss
 * 
 */ 
?>
<div class="board-phase col-sm-3">
	<h4>{{$status->name}}</h4>
   	<div class="coluna">
	   	@each('boards.board',$status->tasks->all(), 'board')
   	</div>
</div>