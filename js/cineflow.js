var pages;

$(document).ready(function() {
  pages = $('.page');

  hidePages();
  showPage('#page-1');

  $('.page-turner').click(function(e) {
    if($(this).attr('name') === 'prev' || proceedToReviewPage($(this))){
      hidePages();
      showPage($(this).attr('data-page-target'));
    } else {
      var s = '[name=read-agreement]';
      $(body).animate({scrollTop: $(s).prop('offsetTop')}, 500, 'swing', function() {
        $(s).parent().parent().removeClass('has-success').addClass('has-error').css('outline', '1px solid #a94442');
      });
    }
  });

  $('[name=read-agreement]').on('change', function() {
    if($(this).prop('checked')) {
      $('[name=read-agreement]').parent().parent().removeClass('has-error').addClass('has-success').css('outline', 'none');
    } else {
      $('[name=read-agreement]').parent().parent().removeClass('has-success').addClass('has-error').css('outline', '1px solid #a94442');
    }
  });
});

function pageManager() {

} // end pageManager()

function hidePages() {
  pages.each(function() {
    $(this).hide().removeClass('active');
  });
} // end hidePages()

function showPage(selector) {
  $(selector).show().addClass('active');
  $('body').animate({scrollTop:0}, 500, 'swing', function() {
    switch(selector)
    {
      case '#page-2':
      updateBreadCrumb(1);
      break;

      case '#page-3':
      updateBreadCrumb(2);
      break;

      default:
      updateBreadCrumb(0);
      break;
    }
  });
} // end showPage()
