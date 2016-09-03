jQuery(document).ready(function($) {
	$('.menu-trigger').on('click touchstart', function(event) {
		event.preventDefault();
		var $index = $(this).attr('data-index');
		var $table = $('.table-wrap[data-index="' + $index + '"]');
		$table.toggleClass('open');
	});
});