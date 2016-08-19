jQuery(document).ready(function($) {
    var $triggerNav = $('#trigger--nav-mobile');
    var $navigation = $('#nav-main');
    var $body = $('body');
    $triggerNav.on('click touchstart', function(event) {
        event.preventDefault();
        $(this).toggleClass('open');
        $navigation.toggleClass('open');
        $body.toggleClass('open');
    });
});