jQuery(document).ready(function($) {
$('.list_item').on('click', function() {
  

    // var form = $(this).val();
    // alert(form)
    var url = '/wp-admin/admin-ajax.php';

    $.ajax({
      url: url,
      type: 'POST',
      // dataType:'json',
      data: {
      action: 'my_custom_taxonomy_filter',
      category: $(this).attr('term'),
    },
      beforeSend: function(xhr) {
         $('#my-custom-filter-results').html('loading...')
      },
      success: function(posts) {
        // Use the `posts` array to display the filtered posts on your website
        $('#my-custom-filter-results').html(posts);
      },
      error: function(error) {
        console.error(error);
      },
      complete: function() {
        // Remove loading spinner or other feedback here if needed
      }
    });
  });
});
