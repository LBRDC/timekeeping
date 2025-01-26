import { generatePDF } from "./dtr.js";
export const loadSelection = () => {
  $("#select-all").on("click", function () {
    var isChecked = this.checked;

    // Select or deselect all checkboxes in the table
    $(".row-checkbox").prop("checked", isChecked);
  });

  // Handle click on individual row checkboxes
  $("#dtr_selection_employee tbody").on("change", ".row-checkbox", function () {
    // If any checkbox is not checked, uncheck "Select All"
    if (!this.checked) {
      $("#select-all").prop("checked", false);
    }

    // If all checkboxes are checked, check "Select All"
    if ($(".row-checkbox:checked").length === $(".row-checkbox").length) {
      $("#select-all").prop("checked", true);
    }
  });

  $("#submit-selected").on("click", async function () {
    var selectedUsers = [];
    $(".row-checkbox:checked").each(function () {
      var id = $(this).data("id");
      var startDate = $(this).data("start");
      var endDate = $(this).data("end");
      selectedUsers.push({
        idnumber: id,
        startDate: startDate,
        endDate: endDate,
      });
    });

    // Check if there are any selected users
    if (selectedUsers.length === 0) {
      alert("No users selected!");
      return;
    }
    const users = { users: selectedUsers };
    _executeRequest(
      "query/attendancereport.php",
      "POST",
      users,
      async function (res) {
        if (!res.Error && !res.result.Error) {
          const { jsPDF } = window.jspdf;
          const doc = new jsPDF({
            orientation: "portrait",
            unit: "pt",
            format: [612, 792],
          });
          const datas = res.result.msg;
          console.log(datas);

          for (let i = 0; i < datas.length; i++) {
            const data = datas[i];
            const { user, attendance } = data;
            await generatePDF(doc, user, attendance);
            if (i < datas.length - 1) {
              doc.addPage();
            }
          }
          const height = window.innerHeight - 50;
          const pdfBlob = doc.output("blob");
          const pdfURL = URL.createObjectURL(pdfBlob);
          const iframe = document.createElement("iframe");
          iframe.src = pdfURL;
          iframe.style.width = "100%";
          iframe.style.height = height + "px";
          const previewContainer = document.getElementById("pdfPreview");
          previewContainer.innerHTML = "";
          previewContainer.appendChild(iframe);
        }
      }
    );
  });
};

const _executeRequest = (url, method, data, result) => {
  $.ajax({
    url: url,
    type: method,
    dataType: "json",
    data: data,
    beforeSend: () => {
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
