//Login
import { authQuery } from "./functions.js";
$(document).on("submit", "#loginFrm", function (event) {
  event.preventDefault();

  var submitButton = $(this).find('button[type="submit"]');
  submitButton.prop("disabled", true);

  var formData = {
    lgn_username: $("#lgn_username").val(),
    lgn_password: $("#lgn_password").val(),
  };

  $.ajax({
    url: "query/loginExe.php",
    type: "POST",
    dataType: "json",
    data: formData,
    beforeSend: function (xhr) {
      xhr.setRequestHeader("Authorization", authQuery);
    },
    success: function (response) {
      if (response.res == "success") {
        // Redirect to home.php on successful login
        window.location.href = "home.php";
      } else if (response.res == "failed") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Wrong username or password. Try Again!",
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "System error occurred. Please try again.",
        });
      }

      submitButton.prop("disabled", false);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      submitButton.prop("disabled", false);

      alert("An error occurred while logging in. Please try again.");
      console.error(textStatus, errorThrown);
    },
  });
});
