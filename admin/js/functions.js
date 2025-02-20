export const _executeRequest = (url, method, data, result) => {
  $.ajax({
    url: url,
    type: method,
    dataType: "json",
    data: data,
    beforeSend: (xhr) => {
      xhr.setRequestHeader("Authorization", authQuery);
      swal.fire({
        title: "Loading...",
        text: "Please wait",
        allowOutsideClick: false,
        allowEscapeKey: false,
      });
    },
    success: (response) => {
      swal.close();
      result({ Error: false, result: response });
    },
    error: (jqXHR, textStatus, errorThrown) => {
      swal.close();
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
      result({ Error: true, result: errorThrown });
    },
  });
};

export const authQuery = "Basic WmhlbjpMYnJkYzIwMjEu";
