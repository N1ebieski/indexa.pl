jQuery(document).on('click', '#searchGus .btn', function(e) {
    e.preventDefault();

    $(document).ajaxComplete(function() {
        $('input#title').val($.sanitize($('input#field\\.13').val()));
    });
});
