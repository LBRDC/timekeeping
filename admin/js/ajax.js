// fields-location-add ADD
$(document).on("submit", "#addLocationFrm", function (event) {
  event.preventDefault();

  var formData = {
    add_LocName: $("#add_LocName").val(),
    add_Latitude: $("#add_Latitude").val(),
    add_Longitude: $("#add_Longitude").val(),
    add_Radius: $("#add_Radius").val(),
  };

  // Validate formData
  var isValid;
  $.each(formData, function (key, value) {
    if (value === "") {
      isValid = false;
      return false; // Break the loop
    } else {
      isValid = true;
    }
  });

  if (!isValid) {
    Swal.fire({
      icon: "warning",
      title: "Incomplete",
      text: "Please fill in all fields.",
    });
    return; // Exit the function if formData is not valid
  }

  console.log("VALIDATED");

  $.ajax({
    url: "query/add_location_Exe.php",
    type: "POST",
    dataType: "json",
    data: formData,
    success: function (response) {
      if (response.res == "success") {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: response.msg + " added.",
          showConfirmButton: false,
          timer: 5000,
          timerProgressBar: true,
        }).then(function () {
          window.location.href = "home.php?page=fields-location";
        });
      } else if (response.res == "exists") {
        Swal.fire({
          icon: "error",
          title: "Failed",
          text: response.msg + "already exists.",
        });
      } else if (response.res == "failed") {
        Swal.fire({
          icon: "error",
          title: "Failed",
          text: "An error occurred while adding location. Please try again.",
        });
      } else if (response.res == "incomplete") {
        Swal.fire({
          icon: "warning",
          title: "Incomplete",
          text: "Please fill in all fields.",
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "System error occurred.",
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("A script error occured. Please try again.");
      console.error(textStatus, errorThrown);
    },
  });
});

// fields-location-edit EDIT
$(document).on("submit", "#editLocationFrm", function (event) {
  event.preventDefault();

  var formData = {
    edit_id: $("#edit_id").val(),
    edit_LocName: $("#edit_LocName").val(),
    edit_Latitude: $("#edit_Latitude").val(),
    edit_Longitude: $("#edit_Longitude").val(),
    edit_Radius: $("#edit_Radius").val(),
    edit_Status: $("#edit_Status").val(),
  };

  // Validate formData
  var isValid;
  $.each(formData, function (key, value) {
    if (value === "") {
      isValid = false;
      return false; // Break the loop
    } else {
      isValid = true;
    }
  });

  if (!isValid) {
    Swal.fire({
      icon: "warning",
      title: "Incomplete",
      text: "Please fill in all fields.",
    });
    return; // Exit the function if formData is not valid
  } else {
    Swal.fire({
      title: "Update?",
      text: "Are you sure you want to edit this location?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "YES",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "query/edit_location_Exe.php",
          type: "POST",
          dataType: "json",
          data: formData,
          success: function (response) {
            if (response.res == "success") {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: response.msg + " updated.",
                timer: 5000,
                timerProgressBar: true,
              }).then(function () {
                window.location.href = "home.php?page=fields-location";
              });
            } else if (response.res == "norecord") {
              Swal.fire({
                icon: "error",
                title: "Failed",
                text: response.msg + "does not exist.",
              });
            } else if (response.res == "failed") {
              Swal.fire({
                icon: "error",
                title: "Failed",
                text: "An error occurred while adding location. Please try again.",
              });
            } else if (response.res == "incomplete") {
              Swal.fire({
                icon: "warning",
                title: "Incomplete",
                text: "Please fill in all fields.",
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "Error",
                text: "System error occurred.",
              });
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert("A script error occured. Please try again.");
            console.error(textStatus, errorThrown);
          },
        });
      }
    });
  }
});

// fields-location EDIT STATUS ERROR
/*$(document).on("submit","#editLocStatusFrm" , function(event) {
    event.preventDefault();
    
    var loc_Id = $('#edit_Id1').val() || $('#edit_Id2').val();
    var edit_LocName = $('#edit_LocName1').val() || $('#edit_LocName2').val();
    var edit_Status = $('#edit_Status1').val() || $('#edit_Status2').val();
    var formData = {
        'edit_Id': loc_Id,
        'edit_LocName': edit_LocName,
        'edit_Status': edit_Status
    };

    // Validate formData
    var isValid;
    $.each(formData, function(key, value) {
        if (value === '') {
            isValid = false;
            return false; // Break the loop
        } else {
            isValid = true;
        }
    });

    if (!isValid) {
        Swal.fire({
            icon: "warning",
            title: "Incomplete",
            text: "Missing fields.",
        });
        return; // Exit the function if formData is not valid
    }

    console.log("VALIDATED");

    $.ajax({
        url: 'query/edit_locationStatus_Exe.php',
        type: 'POST',
        dataType : "json",
        data: formData,
        success: function(response) {
            if (response.res == "disable") {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.msg + " disabled.",
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                }).then(function() {
                    window.location.href = 'home.php?page=fields-location';
                });
            } else if (response.res == "enable") {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.msg + " enabled.",
                });
            } else if (response.res == "failed") {
                Swal.fire({
                    icon: "error",
                    title: "Failed",
                    text: "An error occurred while updating status. Please try again.",
                });
            } else if (response.res == "incomplete") {
                Swal.fire({
                    icon: "warning",
                    title: "Incomplete",
                    text: "Missing fields.",
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "System error occurred.",
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('A script error occured. Please try again.');
            console.error(textStatus, errorThrown);
        }
    });
}); */

//Import Excel
$(document).on("submit", "#importfileFrm", (e) => {
  e.preventDefault();
  const sheetName = $("#sheetName").val();
  const file = $("#importFile")[0].files[0];
  const range = $("#range").val();
  if (!sheetName || !file) {
    swal.fire({
      title: "warning",
      text: "Please fill in all fields",
      icon: "error",
    });
    return;
  }
  const reader = new FileReader();
  reader.onload = (e) => {
    const data = new Uint8Array(e.target.result);
    const workbook = XLSX.read(data, { type: "array" });
    let sheet;

    //validate  excel sheetname
    if (!workbook.Sheets[sheetName]) {
      swal.fire({
        icon: "warning",
        title: "Sheet  not found",
        text: "Please select a valid sheet.",
      });

      return;
    }

    sheet = workbook.Sheets[sheetName];
    const jsonData = XLSX.utils.sheet_to_json(sheet, {
      header: 1,
      defval: "",
      range: range,
    });
    // console.log(jsonData);
    // return;
    //validate excel data
    if (jsonData.length === 0) {
      swal.fire({
        icon: "warning",
        title: "Data not  found",
        text: "Please select a valid sheet with data.",
      });

      return;
    }

    const keys = jsonData[0];
    const values = jsonData.slice(1);
    let newData = [];
    for (let i = 0; i < values.length; i++) {
      let obj = {};
      for (let j = 0; j < keys.length; j++) {
        if (keys[j] != "No.") {
          if (keys[j] != "Employee Name") {
            obj[sanitizeHeader(keys[j])] = values[i][j];
          } else {
            const customName = _splitName(values[i][j]);
            if (!customName.FirstName && !customName.LastName) {
              swal.fire({
                title: "Error",
                text:
                  "Invalid name format=>" +
                  values[i][j] +
                  ". It should be (LASTNAME, FIRSTNAME MIDDLENAME)",
                icon: "error",
              });
              return;
            }
            obj["FirstName"] = customName.FirstName;
            obj["MiddleName"] = customName.MiddleName;
            obj["LastName"] = customName.LastName;
          }
        }
      }
      newData.push(obj);
    }

    let newkeys = ["FirstName", "MiddleName", "LastName"];
    keys.forEach((oldKeys) => {
      if (oldKeys != "No." && oldKeys != "Employee Name") {
        newkeys.push(sanitizeHeader(oldKeys));
      }
    });

    // console.log(ExcelValidation(jsonData));
    //   console.log(newData);
    //   return;
    const filteredEmp = newData.filter((item, index, self) => {
      return self.findIndex((t) => t.IdNumber === item.IdNumber) === index;
    });

    const employees = {
      employees: JSON.stringify(filteredEmp),
      keys: JSON.stringify(newkeys),
    };
    // console.log(filteredEmp);
    // return;

    _executeRequest(
      "query/import_manninglist.php",
      "POST",
      employees,
      (res) => {
        if (!res.Error && !res.result.Error) {
          swal
            .fire({
              title: "Success",
              text: "Import Success",
              icon: "success",
            })
            .then((res) => {
              window.location.reload();
            });
        } else {
          swal.fire({
            title: "Error",
            text: "Internal Server Error",
            icon: "error",
          });
        }
      }
    );
  };
  reader.readAsArrayBuffer(file);
});

const sanitizeHeader = (name) => {
  return name
    .split(" ")
    .map((word) => {
      return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    })
    .join("");
};

$(document).on("submit", "#addEmployeeManninglist", function (e) {
  e.preventDefault();
  const frmdata = new FormData(this);
  let data = [];
  let keys = [];
  let values = [];
  for (let [key, value] of frmdata.entries()) {
    data.push({ [key]: value });
  }
  // console.log(data);
  for (let i = 0; i < data.length; i++) {
    keys.push(Object.keys(data[i]));
    values.push(Object.values(data[i]));
  }
  let employee = {
    keys: JSON.stringify(keys),
    values: JSON.stringify(values),
  };

  _executeRequest(
    "query/manninglist_addEmployee.php",
    "POST",
    employee,
    (res) => {
      if (!res.result.Error) {
        swal
          .fire({
            title: "Success",
            text: res.result.msg,
            icon: "success",
          })
          .then((res) => {
            window.location.reload();
          });
      } else {
        swal.fire({
          title: "Error",
          text: res.result.msg,
          icon: "error",
        });
      }
    }
  );
});

$(document).on("click", "#btndefaultFilter", (e) => {
  const data = [];
  _executeRequest(
    "query/filterTableData.php",
    "POST",
    { filterdata: data },
    (res) => {
      // console.log(res);

      if (!res.result.Error) {
        // const data = res.result.column;
        // const newData = [];
        // data.forEach((element) => {
        //   newData.push(element);
        //   // console.log(element);
        // });
        // console.log(data);
        sessionStorage.removeItem("filteredData");
        swal
          .fire({
            title: "Success",
            text: "",
            icon: "success",
          })
          .then((res) => {
            window.location.reload();
          });
      }
    }
  );
});

$(document).on("submit", "#SavefilterData", function (e) {
  e.preventDefault();
  const listfilter = JSON.parse($(this).attr("data-list"));
  console.log(listfilter);
  if (listfilter.length == 0) {
    return;
  }

  if (listfilter[0].logic != undefined && listfilter[0].logic != "") {
    swal.fire({
      icon: "warning",
      title: "First filter should have no logic",
      text: "Please delete first filter and try again.",
    });
    return;
  }

  // return;
  let data = [];
  listfilter.forEach((element) => {
    // console.log(element.toString());

    data.push(element);
    // data.push(
    //   `${element.logic} ${element.column} ${element.operator}` +
    //     `${element.value}`
    // );
  });
  _executeRequest(
    "query/filterTableData.php",
    "POST",
    { filterdata: data },
    (res) => {
      console.log(res);

      if (!res.result.Error) {
        const data = res.result.column;
        // const newData = [];
        // data.forEach((element) => {
        //   newData.push(element);
        //   // console.log(element);
        // });
        console.log(data);

        sessionStorage.setItem("filteredData", JSON.stringify(data));

        swal
          .fire({
            title: "Success",
            text: "",
            icon: "success",
          })
          .then((res) => {
            window.location.reload();
          });
      }
    }
  );
});

$(document).on("click", ".emp_info", function (e) {
  const data = $(this).data("id");
  _executeRequest(
    "query/manninglist_emp_info.php",
    "POST",
    { id: data },
    (res) => {
      if (!res.result.Error) {
        const parent = $("#emp_info_container");
        const result = res.result.info[0];
        // const curr_input = parent.find("#FirstName");
        const keys = Object.keys(result);
        const values = Object.values(result);

        for (let i = 0; i < keys.length; i++) {
          const input = parent.find(`#${keys[i]}`);
          input.val(values[i]);
        }

        // console.log(keys);
        // console.log(values);
      }
    }
  );
});

$(document).on("click", ".emp_edit", function (e) {
  const data = $(this).data("id");
  _executeRequest(
    "query/manninglist_emp_info.php",
    "POST",
    { id: data },
    (res) => {
      if (!res.result.Error) {
        const parent = $("#emp_edit_container");
        const result = res.result.info[0];
        const keys = Object.keys(result);
        const values = Object.values(result);

        for (let i = 0; i < keys.length; i++) {
          const input = parent.find(`#${keys[i]}`);
          input.val(values[i]);
        }

        // console.log(keys);
        // console.log(values);
      }
    }
  );
});

$(document).on("click", ".emp_disable", function (e) {
  const data = $(this).data("id");
  const name = $(this).data("name");
  $("#disable_name").html(name);
  $("#disable_emp_id").val(data);
});

$(document).on("click", ".emp_enable", function (e) {
  const data = $(this).data("id");
  const name = $(this).data("name");
  $("#enable_name").html(name);
  $("#enable_emp_id").val(data);
});

$(document).on("submit", "#editEmployeeManninglist", function (e) {
  e.preventDefault();
  const frmdata = new FormData(this);
  let data = [];
  let keys = [];
  let values = [];
  for (let [key, value] of frmdata.entries()) {
    data.push({ [key]: value });
  }
  // console.log(data);
  for (let i = 0; i < data.length; i++) {
    keys.push(Object.keys(data[i]));
    values.push(Object.values(data[i]));
  }
  const id = values[0].toString();
  keys.shift();
  values.shift();

  const emp = {
    id: id,
    keys: keys,
    values: values,
  };
  // console.log(JSON.stringify(emp));
  // return;
  _executeRequest("query/manninglist_update.php", "POST", emp, (res) => {
    if (!res.result.Error) {
      swal
        .fire({
          title: "Success",
          text: res.result.msg,
          icon: "success",
        })
        .then((res) => {
          window.location.reload();
        });
    } else {
      swal.fire({
        title: "Error",
        text: res.result.msg,
        icon: "error",
      });
    }
  });
});

$(document).on("submit", "#manninglist_disable_emp", function (e) {
  e.preventDefault();
  const data = $("#disable_emp_id").val();
  updateStatus(data, 0);
});

$(document).on("submit", "#manninglist_enable_emp", function (e) {
  e.preventDefault();
  const data = $("#enable_emp_id").val();
  updateStatus(data, 1);
});

const updateStatus = (id, status) => {
  _executeRequest(
    "query/manninglist_updateStatus.php",
    "POST",
    { id: id, status: status },
    (res) => {
      if (!res.result.Error) {
        swal
          .fire({
            title: "Success",
            text: res.result.msg,
            icon: "success",
          })
          .then((res) => {
            window.location.reload();
          });
      } else {
        swal.fire({
          title: "Error",
          text: res.result.msg,
          icon: "error",
        });
      }
    }
  );
};

const _splitName = (fullName) => {
  if (!fullName) {
    console.log("Name is missing");
    return { Error: "Name is missing" };
  }

  let name = fullName.split(", ");
  if (name.length < 2) {
    return {
      Error: `Invalid name format->${fullName}. It should be (LASTNAME, FIRSTNAME MIDDLENAME)`,
    };
  }
  let lastName = name[0];
  let otherNames = name[1].split(" ");
  let firstName, middleName;

  if (otherNames.length > 1) {
    middleName = otherNames.pop();
    firstName = otherNames.join(" ");
  } else {
    firstName = otherNames[0];
    middleName = "";
  }

  if (!firstName && !lastName) {
    return {
      Error: `Invalid name format->${fullName}. It should be (LASTNAME, FIRSTNAME MIDDLENAME)`,
    };
  }

  return {
    FirstName: firstName.toUpperCase(),
    MiddleName: middleName.toUpperCase(),
    LastName: lastName.toUpperCase(),
  };
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
        showCancelButton: false,
        showConfirmButton: false,
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
