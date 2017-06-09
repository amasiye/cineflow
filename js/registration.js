var breadcrumbs;

$(document).ready(function() {
  breadcrumbs = document.querySelectorAll('.breadcrumb li');
});

function updateBreadCrumb(index) {
  if(undefined !== breadcrumbs) {
    if(index == 0) {
      $('.breadcrumb li').removeClass('active');
    }
    breadcrumbs[index].className += ' active';
  }
} // end updateBreadCrumb()

function proceedToReviewPage(obj) {
  if(obj.attr('data-page-target') === '#page-3')
  {
    return $('[name=read-agreement]').prop('checked');
  }

  return true;
} // end proceedToReviewPage()
