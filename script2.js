function submitForm() {
  var form = document.getElementById('appointmentsForm');

  // Check if the form is valid
  if (form.checkValidity()) {
      // Display the confirmation message
      document.getElementById('confirmation-message').style.display = 'block';

      // Clear the form and hide confirmation after 3 seconds
      setTimeout(function () {
          form.reset();
          clearFormAndHideConfirmation();
      }, 3000);
  } else {
      // If the form is not valid, trigger the form validation
      form.reportValidity();
  }
}

function clearFormAndHideConfirmation() {
  // Hide the confirmation message
  document.getElementById('confirmation-message').style.display = 'none';
}