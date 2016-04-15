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
	<h4>titulo</h4>
   	<div class="coluna">
	   	@each('boards.board', array(array('id'=>'1','title'=>'Primeira Board'),array('id'=>'2','title'=>'Segunda Board')), 'board')
   	</div>
</div>