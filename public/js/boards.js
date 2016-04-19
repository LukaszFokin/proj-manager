$(document).ready(function() {
    $(".box-board").dblclick(function() {
  		$('#board'+$(this).attr('boardid')).modal()
	});
	$(".coluna").sortable(
		{
			connectWith:".coluna",
			placeholder: "board-placeholder ui-corner-all",
			start: function(event, ui) {
		        wscrolltop = $(window).scrollTop();
		    },
		    sort: function(event, ui) {                   
		        ui.helper.css({'top' : ui.position.top + wscrolltop + 'px'});
		    }
		}
	);
});