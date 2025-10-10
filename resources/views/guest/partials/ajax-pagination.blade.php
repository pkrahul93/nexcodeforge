<script>
$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    let pageUrl = $(this).attr('href');
    if (!pageUrl) return;

    $('html, body').animate({ scrollTop: $("#blog-list").offset().top - 100 }, 400);

    $.ajax({
        url: pageUrl,
        type: 'GET',
        beforeSend: function() {
            $('#blog-list').css('opacity', '0.5');
        },
        success: function(response) {
            $('#blog-list').html(response);
            $('#blog-list').css('opacity', '1');

            // Update browser URL (so user can share or navigate)
            window.history.pushState(null, '', pageUrl);
        },
        error: function() {
            alert('Something went wrong while loading posts.');
            $('#blog-list').css('opacity', '1');
        }
    });
});
</script>
