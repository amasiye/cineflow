var registrationForm;

$(document).ready(function() {
  registrationForm = document.querySelector('#registration-form');
  registrationForm.onsubmit = onsubmit;
});

function onsubmit(e) {
  e.stopPropagation();
  e.preventDefault();

  return false;
} // end onsubmit()
