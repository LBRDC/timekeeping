import { generatePDF } from "./dtr.js";
import { loadSelection } from "./employee.js";
document.addEventListener("DOMContentLoaded", function () {
  try {
    new TomSelect(".custom-select-location", {
      create: false,
      sortField: {
        field: "text",
        direction: "asc",
      },
    });
    new TomSelect(".custom-select-department", {
      create: false,
      sortField: {
        field: "text",
        direction: "asc",
      },
    });
    new TomSelect(".custom-select-employee", {
      create: false,
      sortField: {
        field: "text",
        direction: "asc",
      },
    });
    new TomSelect(".custom-select-deptlocation", {
      create: false,
      sortField: {
        field: "text",
        direction: "asc",
      },
    });
  } catch (error) {
    // console.log(error);
  }
});

$(document).ready(async function () {
  loadSelection();
  $("#dtr_table").DataTable({
    scrollX: true,
    width: "100%",
  });

  $("#mobileUserTable").DataTable();
  $("#dataTable").DataTable(); // ID From dataTable
  $("#dataTableHover").DataTable(); // ID From dataTable with Hover
  let rateArray = await regionRate();
  let locArray = await fieldLocation();
  let regionSelection = $("#Region:not(div)");
  let locationSelection = $("#Location:not(div)");
  const manninglistTbl = $("#manningList").DataTable({
    colReorder: true,
    colResize: true,
    scrollX: false,
    columnDefs: [
      { targets: 1, width: "230px" },
      { targets: 0, width: "100px" },
    ],
    dom: "Bfrtip",
    pageLength: 10,
    buttons: [
      {
        extend: "excelHtml5",
        text: "Excel",
        className: "btn btn-success",
        title: "Manninglist Employees",
        exportOptions: {
          columns: ":visible:not(:last-child)",
        },
      },
      {
        extend: "pageLength",
        text: "Page",
        className: "btn btn-secondary",
      },
    ],
  });
  if (manninglistTbl.columns().count() >= 6) {
    $("#manningList").DataTable().destroy();
    $("#manningList").DataTable({
      colReorder: true,
      colResize: true,
      scrollX: true,
      columnDefs: [{ targets: 1, width: "230px" }],
      dom: "Bfrtip",
      buttons: [
        {
          extend: "excelHtml5",
          text: "Excel",
          className: "btn btn-success",
          title: "Manninglist Employees",
          exportOptions: {
            columns: ":visible:not(:nth-last-child(-n+2))",
          },
        },
        {
          extend: "pageLength",
          text: "Page",
          className: "btn btn-secondary",
        },
      ],
    });
  }

  $("#fld_employee").on("change", function () {
    const position = $(this).find(":selected").data("pos");
    const unitofassignment = $(this).find(":selected").data("unit");
    $("#fld_position").val(position);
    $("#fld_unitofassignment").val(unitofassignment);
  });

  rateArray.forEach((item) => {
    regionSelection.append(
      `<option value='${item.rate}'>${item.region}</option>`
    );
  });

  locArray.forEach((item) => {
    locationSelection.append(
      `<option value='${item.fld_location_id}'>${item.name_location}</option>`
    );
  });

  const targetColumnIndex = manninglistTbl
    .columns()
    .header()
    .toArray()
    .findIndex((header) => $(header).text() === "UNIT OF ASSIGNMENT");

  const remarksColumn = manninglistTbl
    .columns()
    .header()
    .toArray()
    .findIndex((header) => $(header).text() === "REMARKS");

  manninglistTbl.column(remarksColumn).header({
    with: "300px",
  });
  if (remarksColumn !== -1) {
    manninglistTbl
      .column(remarksColumn)
      .data()
      .each(function (data, index) {
        if (data.length >= 15) {
          const mtext = data.substring(0, 5) + "...";
          const cell = manninglistTbl.cell(index, remarksColumn).node();
          const escapedData = $("<div>").text(data).html();
          $(cell).html(
            `<span title="${escapedData.replace("&amp;", "&")}">${mtext}</span>`
          );
        }
      });
  }

  if (targetColumnIndex !== -1) {
    manninglistTbl
      .column(targetColumnIndex)
      .data()
      .each(function (data, index) {
        if (data.length >= 15) {
          const mtext = data.substring(0, 15) + "...";
          const cell = manninglistTbl.cell(index, targetColumnIndex).node();
          const escapedData = $("<div>").text(data).html();
          $(cell).html(
            `<span title="${escapedData.replace("&amp;", "&")}">${mtext}</span>`
          );
        }
      });
  }
  manninglistTbl.draw();

  //Datepicker
  $("#datepicker-year .input-group.date").datepicker({
    startView: 2,
    format: "mm/dd/yyyy",
    autoclose: true,
    todayHighlight: true,
    clearBtn: true,
  });

  $("#Region:not(div)").on("change", function () {
    const rate = $(this).val();
    $("#SalaryRate:not(div)").val(rate);
  });

  //Filter Column
  const saveData = JSON.parse(sessionStorage.getItem("filteredData")) ?? [];
  let selectedBox = [];

  // return;
  const checkboxes = document.querySelectorAll(".listColumns");
  const onLoadCheckBox = JSON.parse(sessionStorage.getItem("columns")) ?? [];

  //Check the state of checkbox and set changes
  onLoadCheckBox.every((list) => {
    const isHave = Array.from(checkboxes).find((item) => item.value == list);
    if (isHave) {
      isHave.checked = true;
      selectedBox.push(isHave.value);
      return true;
    }
    return false;
  });

  //Change the state of checkbox list text
  const txt = "[ " + selectedBox.join(", ") + " ]";
  $("#checkboxList").html(selectedBox.length != 0 ? txt : "");

  //Checkbox State (Click Event)
  checkboxes.forEach(function (chckbox) {
    chckbox.addEventListener("change", function (e) {
      if ($(this).is(":checked")) {
        selectedBox.push($(this).val());
      } else {
        selectedBox.splice(selectedBox.indexOf($(this).val()), 1);
      }
      const txt = "[ " + selectedBox.join(", ") + " ]";
      $("#checkboxList").html(selectedBox.length == 0 ? "" : txt);
    });
  });

  //checkAll
  $("#checkAll").on("click", function () {
    selectedBox = [];
    checkboxes.forEach(function (chck) {
      chck.checked = true;
      selectedBox.push(chck.value);
    });
    const txt = "[ " + selectedBox.join(", ") + " ]";
    $("#checkboxList").html(selectedBox.length != 0 ? txt : "");
  });

  //UncheckAll
  $("#uncheckAll").on("click", function () {
    selectedBox = [];
    checkboxes.forEach(function (chck) {
      chck.checked = false;
    });
    $("#checkboxList").html("");
  });

  //Save filter Column
  $("#SavefilterColumn").on("submit", (e) => {
    e.preventDefault();
    setTimeout(() => {
      _executeRequest(
        "query/filterTable.php",
        "POST",
        { column: JSON.stringify(selectedBox) },
        (res) => {
          if (!res.Error) {
            sessionStorage.setItem("columns", JSON.stringify(selectedBox));
            window.location.reload();
          }
        }
      );
    }, 500);
  });

  //remove input

  const removeInputBtn = document.querySelectorAll(".close-btn");
  $(removeInputBtn).on("click", function (e) {
    const target = $(this).data("id");
    const name = $(this).data("name");
    const parent = $(this).closest(`#${target}`);

    if (
      target == "Region" ||
      target == "SalaryRate" ||
      target == "IdNumber" ||
      target == "FirstName" ||
      target == "LastName"
    ) {
      Swal.fire({
        title: name,
        text: "You are not allowed to remove this field",
        icon: "warning",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Okay",
      });
      return;
    }

    Swal.fire({
      title: name,
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes",
    }).then((result) => {
      if (result.isConfirmed) {
        parent.remove();
      }
    });
  });

  //Add Filter Data
  let filterList = saveData.length != 0 ? saveData : [];
  // console.log(filterList);

  if (saveData.length != 0) {
    let filter = [];
    filterList.forEach((item, index) => {
      filter.push({
        logic: item.logic,
        column: item.column,
        operator: item.operator,
        value: item.value,
      });
    });
    filterList = filter;
    $("#SavefilterData").attr("data-list", JSON.stringify(filterList));
  }
  // return;
  // console.log(filterList);

  updateFilterlistHeader(filterList);
  updateFilterList(filterList);
  $("#addFilter").on("click", (e) => {
    const column = $("#filterdata_column");
    const operator = $("#filterdata_operator");
    const value = $("#filterdata_value");
    const logic = $("#filterdata_logic");
    const data = { column, operator, value, logic };
    // console.log(filterList.length);
    // console.log(logic.val().length);

    if (filterList.length >= 1 && !logic.val()) {
      swal.fire({
        title: "Warning",
        text: "Logic is required",
        icon: "warning",
      });
      return;
    }
    if (!column.val() || !operator.val()) {
      swal.fire({
        title: "Warning",
        text: "All fields are required",
        icon: "warning",
      });
      return;
    }
    data.column = column.val();
    data.operator = operator.val();
    data.value =
      data.column == "emp_status"
        ? value.val().toLowerCase() == "inactive"
          ? 0
          : value.val().toLowerCase() == "active"
          ? 1
          : value.val()
        : value.val();
    data.logic = logic.val();

    filterList.push(data);

    updateFilterlistHeader(filterList);
    updateFilterList(filterList);
    column.val("");
    operator.val("");
    value.val("");
    logic.val("");
    $("#SavefilterData").attr("data-list", JSON.stringify(filterList));
  });

  //Mobile Account
  $(".acc_edit").on("click", function (e) {
    const id = $(this).data("id");
    const data = {
      id: id,
    };
    _executeRequest("query/view_mobile_user.php", "POST", data, (res) => {
      const result = res.result.msg;
      $("#edit_fld_location").val(result.loc_id);
      $("#edit_fld_employee").val(result.IdNumber);
      $("#edit_fld_position").val(result.Position);
      $("#edit_fld_unitofassignment").val(result.UnitOfAssignment);
      $("#accountID").val(id);
    });
  });

  //Updating Status Button Mobile Account
  $(".acc_enable").on("click", function (e) {
    const id = $(this).data("id");
    const name = $(this).data("name");
    $("#acc_enable_name").html(name);
    $("#acc_enable_id").val(id);
  });

  $(".acc_disable").on("click", function (e) {
    const id = $(this).data("id");
    const name = $(this).data("name");
    $("#acc_disable_name").html(name);
    $("#acc_disable_id").val(id);
  });
  $(".acc_reset").on("click", function (e) {
    const id = $(this).data("id");
    const name = $(this).data("name");
    $("#acc_reset_name").html(name);
    $("#acc_reset_id").val(id);
  });
});

const regionRate = async () => {
  const res = await fetch("query/regionrate.php");
  const result = await res.json();
  return result.rates;
};

const fieldLocation = async () => {
  const res = await fetch("query/fldLocations.php");
  const result = await res.json();
  return result.locations;
};

const getRateByRegion = (regions, region) => {
  const foundRegion = regions.find((r) => r.region === region);
  return foundRegion ? foundRegion.rate : null;
};

const updateFilterlistHeader = (filterList) => {
  $("#filterList").html(filterList.length == 0 ? "" : "Filter List");
  if (filterList.length == 0) {
    $("#logic_input").css("display", "none");
  } else {
    $("#logic_input").css("display", "block");
  }
};

const updateFilterList = (filterList) => {
  const parentRow = $("#filterListtable");
  parentRow.html("");
  for (let i = 0; i < filterList.length; i++) {
    const txt = `[${i + 1}]=> ${filterList[i].logic} [ ${
      filterList[i].column == "emp_status" ? "Status" : filterList[i].column
    } ${filterList[i].operator} ${
      filterList[i].value.length == 0 ? "empty" : filterList[i].value
    } ]`;

    parentRow.append(`<div class="row my-2 listfilter">
          <div class="col-md-11 shadow-sm pt-2  d-flex align-items-center rounded">
              <label class="font-weight-bold">${txt}</label>
          </div>
            <div class="col-md-1 d-flex justify-content-center align-items-center">
    <button type="button" class="btn btn-danger removeFilter"><i class="fas fa-times"></i></button>
  </div>
        </div>`);
  }

  const removeFilterBtn = $(".removeFilter");
  removeFilterBtn.on("click", function (e) {
    const index = $(this).closest(".listfilter").index();
    filterList.splice(index, 1);
    updateFilterlistHeader(filterList);
    updateFilterList(filterList);
    $("#SavefilterData").attr("data-list", JSON.stringify(filterList));
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

$(document).on("click", ".update_department_btn", function () {
  const departmentId = $(this).attr("data-id");
  const departmentName = $(this).attr("data-name");
  const departmentCode = $(this).attr("data-code");
  const departmentLoc = $(this).attr("data-dept-location");

  $("#edit_DeptCode").val(departmentCode);
  $("#edit_DeptName").val(departmentName);
  $("#edit_DeptId").val(departmentId);
  $("#edit_dept_location").val(departmentLoc);
});

$(document).on("click", ".enable_dept", function () {
  const departmentId = $(this).attr("data-id");
  const departmentName = $(this).attr("data-code");
  $("#mdlEnableDeptname").html(departmentName);
  $("#dept_enable_id").val(departmentId);
});

$(document).on("click", ".disable_dept", function () {
  const departmentId = $(this).attr("data-id");
  const departmentName = $(this).attr("data-code");
  $("#mdlDisableDeptname").html(departmentName);
  $("#dept_disable_id").val(departmentId);
});

$(document).on("click", ".delete_holiday_btn", function () {
  const holidayId = $(this).attr("data-id");
  const holidayName = $(this).attr("data-name");
  $("#mdlDeleteHolidayName").html(holidayName);
  $("#holiday_delete_id").val(holidayId);
});

$(document).on("click", ".delete_signatory_btn", function () {
  const signatoryId = $(this).attr("data-id");
});

$(document).on("click", ".setDefaultBtn", function () {
  const id = $(this).attr("data-id");
  const data = {
    id: id,
    fields: "signatory",
    key: "setDefault",
  };
  _executeRequest("query/fields.php", "POST", data, (res) => {
    if (!res.Error && !res.result.Error) {
      window.location.reload();
    } else {
      swal.fire({
        title: "Error",
        text: res.result.msg,
        icon: "error",
      });
    }
  });
});

$(document).on("click", ".delete_signatory_btn", function () {
  const signatoryId = $(this).attr("data-id");
  const name = $(this).attr("data-name");
  const data = { id: signatoryId, fields: "signatory", key: "delete" };

  Swal.fire({
    title: name,
    text: "Remove this signatory",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Okay",
  }).then((result) => {
    if (result.isConfirmed) {
      _executeRequest("query/fields.php", "POST", data, (res) => {
        if (!res.Error && !res.result.Error) {
          window.location.reload();
        } else {
          swal.fire({
            title: "Error",
            text: res.result.msg,
            icon: "error",
          });
        }
      });
    }
  });
});

$(document).on("click", "#load_employee_btn", async function () {});

function convertDateRange(dateRange) {
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

  const [startDate, endDate] = dateRange.split(" - ");
  const [startMonth, startDay, startYear] = startDate.split("-");
  const [endMonth, endDay, endYear] = endDate.split("-");

  const startMonthName = months[parseInt(startMonth) - 1];
  const endMonthName = months[parseInt(endMonth) - 1];

  if (startYear === endYear && startMonth === endMonth) {
    return `${startMonthName} ${startDay}-${endDay} ${startYear}`;
  } else {
    return `${startMonthName} ${startDay} ${startYear} - ${endMonthName} ${endDay} ${endYear}`;
  }
}

$(document).on("click", ".update_position", function () {
  const positionId = $(this).attr("data-id");
  const positionName = $(this).attr("data-name");
  const positionCode = $(this).attr("data-code");
  const positionDesc = $(this).attr("data-description");
  const positionDailyRate = $(this).attr("data-daily");
  const positionMonthlyRate = $(this).attr("data-monthly");

  $("#edit_PosName").val(positionName);
  $("#edit_PosCode").val(positionCode);
  $("#edit_PosDesc").val(positionDesc);
  $("#edit_pos_id").val(positionId);
  $("#edit_dailyRate").val(positionDailyRate);
  $("#edit_monthlyRate").val(positionMonthlyRate);
});

$(document).on("click", ".enable_position", function (e) {
  e.preventDefault();
  const positionId = $(this).attr("data-id");
  const positionName = $(this).attr("data-name");
  $("#mdlEnablePosition").html(positionName);
  $("#pos_enable_id").val(positionId);
});

$(document).on("click", ".disable_position", function (e) {
  e.preventDefault();
  const positionId = $(this).attr("data-id");
  const positionName = $(this).attr("data-name");
  $("#mdlDisablePosition").html(positionName);
  $("#pos_disable_id").val(positionId);
});

$(document).on("click", "#btnEnablelocation", function () {
  const locId = $("#view_location").val();
  $("#edit_Id2").val(locId);
});

$(document).on("click", "#btnDisableLocation", function (e) {
  e.preventDefault();
  const locId = $("#view_location").val();
  $("#edit_Id1").val(locId);
});

$(document).on("submit", "#editEnableLoc", function (e) {
  e.preventDefault();
  const id = $("#edit_Id2").val();

  if (!id) {
    swal.fire({
      title: "Error",
      text: "Location ID is required",
      icon: "error",
    });
    return;
  }
  updateLocStatus(id, 1);
});

$(document).on("submit", "#editDisableLoc", function (e) {
  e.preventDefault();
  const id = $("#edit_Id1").val();
  if (!id) {
    swal.fire({
      title: "Error",
      text: "Location ID is required",
      icon: "error",
    });
    return;
  }
  updateLocStatus(id, 0);
});

function updateLocStatus(id, status) {
  const data = { id: id, status: status };
  _executeRequest("query/location.php", "POST", data, (res) => {
    if (!res.Error && !res.result.Error) {
      window.location.reload();
    } else {
      swal.fire({
        title: "Error",
        text: res.result.msg,
        icon: "error",
      });
    }
  });
}
