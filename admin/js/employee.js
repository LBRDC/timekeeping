import { generatePDF } from "./dtr.js";
import { authQuery } from "./functions.js";
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
      var accid = $(this).data("accid");
      var startDate = $(this).data("start");
      var endDate = $(this).data("end");
      selectedUsers.push({
        idnumber: id,
        accid: accid,
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
          const startDate = new Date(res.result.msg[0].startdate);
          const endDate = new Date(res.result.msg[0].enddate);
          const startDateRange = res.result.msg[0].startdate;
          const endDateRange = res.result.msg[0].enddate;

          datas.forEach((data) => {
            const { attendance } = data;
            let currentDate = new Date(startDate);

            while (currentDate <= endDate) {
              const dateStr = `${("0" + (currentDate.getMonth() + 1)).slice(
                -2
              )}-${("0" + currentDate.getDate()).slice(
                -2
              )}-${currentDate.getFullYear()}`;
              if (!attendance.some((a) => a.timestamps === dateStr)) {
                attendance.push({
                  timestamps: dateStr,
                  check_in: "",
                  break_out: "",
                  break_in: "",
                  check_out: "",
                  ot_in: "",
                  ot_out: "",
                });
              }
              currentDate.setDate(currentDate.getDate() + 1);
            }
            attendance.sort(
              (a, b) => new Date(a.timestamps) - new Date(b.timestamps)
            );
          });

          // console.log(datas);
          // return;

          for (let i = 0; i < datas.length; i++) {
            const data = datas[i];
            const { user, attendance, holidays, signatory } = data;
            await generatePDF(
              doc,
              user,
              attendance,
              daterange(startDateRange, endDateRange),
              holidays,
              signatory
            );
            if (i < datas.length - 1) {
              doc.addPage();
            }
          }
          $("#mdlLoadSelectedEmployee").modal("hide");
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

function daterange(startDateStr, endDateStr) {
  const months = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ];

  const [startMonth, startDay, startYear] = startDateStr.split("-");
  const [endMonth, endDay, endYear] = endDateStr.split("-");

  const startMonthWord = months[parseInt(startMonth, 10) - 1];
  const endMonthWord = months[parseInt(endMonth, 10) - 1];

  if (startYear === endYear) {
    if (startMonth === endMonth) {
      return `${startMonthWord} ${parseInt(startDay, 10)}-${parseInt(
        endDay,
        10
      )} ${startYear}`;
    } else {
      return `${startMonthWord} ${parseInt(
        startDay,
        10
      )} - ${endMonthWord} ${parseInt(endDay, 10)} ${startYear}`;
    }
  } else {
    return `${startMonthWord} ${parseInt(
      startDay,
      10
    )} ${startYear} - ${endMonthWord} ${parseInt(endDay, 10)} ${endYear}`;
  }
}

const _executeRequest = (url, method, data, result) => {
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
