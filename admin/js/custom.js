document.addEventListener("DOMContentLoaded", function () {
  try {
    new TomSelect(".custom-select-location", {
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
  } catch (error) {
    // console.log(error);
  }
});

$(document).ready(async function () {
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

/**
 * Retrieves a list of regions with their corresponding rates from the database.
 *
 * @returns {Promise<Array<{region: string, rate: number}>>} A promise that resolves to a list of region-rate pairs.
 */
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
/**
 * Retrieves the rate for a specific region from the given list of regions.
 *
 * @param {Array} regions - The list of regions containing region-rate pairs.
 * @param {string} region - The specific region to retrieve the rate for.
 * @returns {number | null} The rate for the specified region, or null if the region is not found.
 */
const getRateByRegion = (regions, region) => {
  const foundRegion = regions.find((r) => r.region === region);
  return foundRegion ? foundRegion.rate : null;
};

/**
 * Updates the filter list header based on the given filter list.
 * If the filter list is empty, the header is cleared and the logic input is hidden.
 * Otherwise, the header is set to "Filter List" and the logic input is shown.
 * @param {Array} filterList - The list of filters
 */
const updateFilterlistHeader = (filterList) => {
  $("#filterList").html(filterList.length == 0 ? "" : "Filter List");
  if (filterList.length == 0) {
    $("#logic_input").css("display", "none");
  } else {
    $("#logic_input").css("display", "block");
  }
};

/**
 * Updates the UI of the filter list based on the given filterList.
 * @param {Object[]} filterList - Array of objects containing the filter data.
 * @example
 * const filterList = [
 *   { logic: "AND", column: "name", operator: "=", value: "John" },
 *   { logic: "OR", column: "age", operator: "<", value: "20" },
 * ];
 * updateFilterList(filterList);
 */
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

/**
 * Sends an AJAX request to the specified URL using the provided HTTP method.
 * Displays a loading dialog while the request is in progress and closes it once
 * the request is completed. Calls the result callback with the response data or
 * an error object based on the result of the request.
 *
 * @param {string} url - The URL to send the request to.
 * @param {string} method - The HTTP method to use for the request (e.g., "GET", "POST").
 * @param {object} data - The data to be sent along with the request.
 * @param {function} result - Callback function to handle the response. Receives an
 *                            object with an `Error` property indicating success or failure,
 *                            and a `result` property containing the response data or error.
 */
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
