jQuery(document).ready(function($) {
    var $triggerNav = $('#trigger--nav-mobile');
    var $navigation = $('#nav-main');
    $triggerNav.on('click touchstart', function(event) {
        event.preventDefault();
        $(this).toggleClass('open');
        $navigation.toggleClass('open');
    });
});