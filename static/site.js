jQuery(document).ready(function($) {
    resyWidget.config({
        "venueId": 4068,
        "apiKey": "8QY40rS9rgkIJqsnvRUDAWuPk7gbMPGS",
        "replace": true
    });
    $('.rsrv-link').on('click touchstart', function(event) {
        event.preventDefault();
        resyWidget.openModal();
    });
});