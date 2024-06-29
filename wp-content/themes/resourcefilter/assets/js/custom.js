jQuery(document).ready(function() {
    jQuery('a[data-category]').on('click', function(e) {
        e.preventDefault();

        var category = jQuery(this).data('category');
        var data = {
            action: 'filter_resources',
            category: category,
        };

        jQuery.ajax({
            url: my_ajax_object.ajax_url,
            type: 'POST',
            data: data,
            success: function(response) {
                jQuery('.posts').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    jQuery('.filters li').on('click', function() {
        $(this).addClass('active').siblings().removeClass('active');
    });

});
