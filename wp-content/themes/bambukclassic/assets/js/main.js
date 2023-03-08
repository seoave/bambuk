/* loadmore*/
jQuery(document).ready(function ($) {
  let currentPage = null;
  let clicks = []

  $('.load-more-posts').on('click', function () {
    let postType = $(this).data('post')
    let term = $(this).data('term')
    let perPage = $(this).data('page')
    let button = $(this)
    let container = $(this).parent().prev()
    let currentClick = { 'button': button[0], 'currentPage': 2 }

    /* update current page number */
    let hasClick = clicks.find(obj => obj.button === button[0])

    if (hasClick === undefined) {
      clicks.push(currentClick)
      currentPage = 2;
    } else {
      let updatedClick = { 'button': button[0], 'currentPage': hasClick.currentPage + 1 }
      let tempClicks = [...clicks]
      let index = tempClicks.findIndex(obj => obj.button === button[0])
      tempClicks.splice(index, 1)
      tempClicks.push(updatedClick)
      clicks = [...tempClicks]
      currentPage = updatedClick.currentPage;
    }

    $.ajax({
      type: 'POST',
      url: ajaxposts.ajaxurl,
      dataType: 'json',
      data: {
        action: 'loadmore',
        paged: currentPage,
        postType: postType,
        perPage: perPage,
        term: term,
        security: ajaxposts.security,
      },
      success: function (response) {
        if (currentPage >= response.max_pages) {
          button.hide()
        }
        container.append(response.content)
      }
    })
  })
})
