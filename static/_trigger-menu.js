jQuery(document).ready(function($) {
    $('.menu-trigger').on('click touchstart', function(event) {
        
        var $index = $(this).attr('data-index');
        if ($index) {
            event.preventDefault();
            var $table = $('.table-wrap[data-index="' + $index + '"]');
            if ($table.hasClass('open')) {
                $table.removeClass('open');
            } else {
            	$('.table-wrap').removeClass('open');
                $table.addClass('open');
            }
        }
    });
});