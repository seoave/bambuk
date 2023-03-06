/* loadmore*/
jQuery(document).ready(function ($) {
  let currentPage = 1
  $('#more-news').on('click', function () {
    let postType = $(this).data('post')
    console.log(postType)
    currentPage++
    $.ajax({
      type: 'POST',
      url: ajaxposts.ajaxurl,
      dataType: 'json',
      security: ajaxposts.security,
      data: {
        action: 'loadmore',
        paged: currentPage,
      },
      success: function (response) {
        if (currentPage >= response.max_pages) {
          $('#more-news').hide()
        }
        $('.news-list').append(response.content)
      }
    })
  })
})

jQuery(document).ready(function ($) {
  let currentPage = 1
  $('#more-medias').on('click', function () {
    currentPage++
    $.ajax({
      type: 'POST',
      url: ajaxposts.ajaxurl,
      dataType: 'json',
      security: ajaxposts.security,
      data: {
        action: 'loadmore',
        paged: currentPage,
      },
      success: function (response) {
        if (currentPage >= response.max_pages) {
          $('#more-medias').hide()
        }
        $('.medias-list').append(response.content)
      }
    })
  })
})
