import { verdana, verdana_italic, verdana_bold } from "./font.js";
import { columnWidths, headers } from "./pdfconfigure.js";
export const generatePDF = async (doc, user, rows = [], dateRange = "") => {
  // Nested function
  function loadImage(src) {
    return new Promise((resolve, reject) => {
      const img = new Image();
      img.onload = () => resolve(img);
      img.onerror = (err) => {};
      img.src = src;
    });
  }

  function addFont(doc, fontName, font, style) {
    doc.addFileToVFS(fontName + ".ttf", font);
    doc.addFont(fontName + ".ttf", fontName, style);
  }

  //Rest day checker
  function isWeekend(date) {
    const day = new Date(date).getDay();
    return day === 0 || day === 6;
  }

  //All images
  const images = [
    "../img/pdf/logojpg.jpg",
    "../img/pdf/header1.jpg",
    "../img/pdf/header2.png",
  ];
  const promises = images.map((src) => loadImage(src));
  const loadedImages = await Promise.all(promises);

  // Add custom font
  addFont(doc, "verdana", verdana, "normal");
  addFont(doc, "verdana_bold", verdana_bold, "bold");
  addFont(doc, "verdana_italic", verdana_italic, "italic");
  doc.setFontSize(10);
  doc.setFont("verdana_bold", "bold");
  //Setting the header image
  doc.addImage(loadedImages[0], "JPG", 35, 15, 60, 60);
  doc.addImage(loadedImages[1], "JPG", 365, 30, 71.32, 47.56);
  doc.addImage(loadedImages[2], "PNG", 365, 30, 43.24, 47.56);
  doc.setTextColor("#7aad71");
  doc.text("LBP Resources and Development Corporation", 100, 30);
  doc.setFontSize(8);
  doc.setFont("verdana", "normal");
  doc.text("Formerly: LB (Land Bank) Realty Development Corporation", 100, 40);
  doc.setTextColor("#000000");
  doc.text("A Subsidiary of the Land Bank of the Philippines", 100, 50);
  doc.text("VAT Reg. TIN 000-129-546", 100, 60);
  doc.setFont("verdana_bold", "bold");
  doc.text("BS EN ISO 9001:2015", 100, 70);
  doc.setFont("verdana_bold", "bold");
  doc.setFontSize(18);
  doc.text("CLASS D", 450, 40);
  doc.setFontSize(9);
  doc.setFont("verdana", "normal");
  doc.text("SF-48", 450, 53);
  doc.text("REVISION No.:01", 450, 63);
  doc.text("REVISION DATE: OCT. 16, 2023", 450, 73);
  doc.setFontSize(11);
  doc.setFont("verdana_bold", "bold");
  doc.text(user.location, 35, 100);
  doc.text("INDIVIDUAL ATTENDANCE REPORT", 306, 130, {
    align: "center",
  });
  doc.setFont("verdana_italic", "italic");
  doc.setFontSize(8);

  doc.text(dateRange, 306, 140, { align: "center" });
  doc.text(user.idnumber.toString(), 40, 155);
  doc.text(user.name, 80, 155);
  doc.text(user.position, 180, 155);
  doc.text(user.department, 280, 155);
  doc.text(user?.employmentStatus, 380, 155);

  //TABLE FOR ATTENDANCE
  const _tableStartX = 30;
  let _tableStartY = 180;
  const _tableRowHeight = 12;
  const _tablePadding = 8; // Padding in each cell
  const _tableHeaderHeight = 20;

  headers.forEach((header, index) => {
    const colWidth = columnWidths[index];
    const headerWidth = doc.getTextWidth(header);
    doc.setFont("verdana_bold", "bold");
    doc.setFontSize(8);
    doc.rect(
      _tableStartX + columnWidths.slice(0, index).reduce((a, b) => a + b, 0),
      _tableStartY - _tableHeaderHeight,
      colWidth,
      _tableHeaderHeight
    );
    doc.text(
      header,
      _tableStartX +
        columnWidths.slice(0, index).reduce((a, b) => a + b, 0) +
        (colWidth - headerWidth) / 2,
      _tableStartY - _tableHeaderHeight + _tableHeaderHeight / 2 + 4
    );
  });

  rows.forEach((row) => {
    row.forEach((cell, index) => {
      if (isWeekend(row[0])) {
        doc.setFillColor("#d9d9d9");
      } else {
        doc.setFillColor("#ffffff");
      }
      const colWidth = columnWidths[index];
      const cellX =
        _tableStartX + columnWidths.slice(0, index).reduce((a, b) => a + b, 0);
      doc.setFont("verdana", "normal");
      doc.setFontSize(7);
      doc.rect(cellX, _tableStartY, colWidth, _tableRowHeight, "F");
      doc.rect(cellX, _tableStartY, colWidth, _tableRowHeight);
      const cellWidth = doc.getTextWidth(cell);
      doc.text(
        cell,
        cellX + (colWidth - cellWidth) / 2,
        _tableStartY + _tableRowHeight / 2 + 4
      );
    });
    _tableStartY += _tableRowHeight;
  });

  //End of Table for Attendance

  //Summary and Legend

  //Summary
  const _summaryFirstTableHeight =
    _tableHeaderHeight + rows.length * _tableRowHeight;
  let _summaryStartY = _tableStartY + 30;

  const _summaryHeader = "Summary";
  const _summaryRows = [
    ["Reg Days (Days)", "15"],
    ["Reg Days (Hrs & Mins)", "15"],
    ["Undertime (m)", "15"],
    ["Rest Day (RD)/Special Holiday (SH) (h) (130%)", "15"],
  ];
  const _summaryColumnWidths = [250, 30];
  const _summaryTableWidth = _summaryColumnWidths.reduce((a, b) => a + b, 0);
  doc.setFont("verdana_bold", "bold");
  doc.rect(
    _tableStartX,
    _summaryStartY - _tableHeaderHeight,
    _summaryTableWidth,
    _tableHeaderHeight
  );
  const _summaryHeaderWidth = doc.getTextWidth(_summaryHeader);
  doc.text(
    _summaryHeader,
    _tableStartX + (_summaryTableWidth - _summaryHeaderWidth) / 2,
    _summaryStartY - _tableHeaderHeight + _tableHeaderHeight / 2 + 4
  );

  _summaryRows.forEach((row) => {
    row.forEach((cell, index) => {
      const _summaryColWidth = _summaryColumnWidths[index];
      const _summaryCellX =
        _tableStartX +
        _summaryColumnWidths.slice(0, index).reduce((a, b) => a + b, 0);
      doc.setFont("verdana", "normal");
      doc.setFontSize(8);
      doc.rect(
        _summaryCellX,
        _summaryStartY,
        _summaryColWidth,
        _tableRowHeight
      );
      const _summaryCellWidth = doc.getTextWidth(cell);
      doc.text(
        cell,
        _summaryCellX + 10,
        _summaryStartY + _tableRowHeight / 2 + 4
      );
    });
    _summaryStartY += _tableRowHeight;
  });

  //Legend
  const _legendStartX = _tableStartX + _summaryTableWidth + 160;
  const _legendStartY = _tableStartY + 20;

  doc.setFont("verdana_bold", "bold");
  doc.setFontSize(10);
  doc.text("Legend", _legendStartX, _legendStartY);
  const _legendRows = [
    ["Rest Day", "#d9d9d9"],
    ["Legal Holiday", "#ffff7c"],
    ["Local Special Holiday", "#b2fbbb"],
  ];
  const _legendColumnWidths = [90, 30];
  const _legendRowHeight = 15;

  let _legendGridStartY = _legendStartY + 10;

  _legendRows.forEach((row) => {
    row.forEach((cell, index) => {
      const _legendColWidth = _legendColumnWidths[index];
      const _legendCellX =
        _legendStartX +
        _legendColumnWidths.slice(0, index).reduce((a, b) => a + b, 0);
      if (index === 1) {
        doc.setFillColor(
          parseInt(cell.slice(1, 3), 16),
          parseInt(cell.slice(3, 5), 16),
          parseInt(cell.slice(5, 7), 16)
        );
        doc.rect(
          _legendCellX,
          _legendGridStartY,
          _legendColWidth,
          _legendRowHeight,
          "F"
        );
      } else {
        doc.setFont("verdana", "normal");
        doc.setFontSize(8);
        doc.text(
          cell,
          _legendCellX + 2,
          _legendGridStartY + _legendRowHeight / 2 + 4
        );
      }
    });
    _legendGridStartY += _legendRowHeight;
  });

  _legendRows.forEach((_, rowIndex) => {
    const _legendRowY = _legendStartY + 10 + rowIndex * _legendRowHeight;
    doc.rect(
      _legendStartX,
      _legendRowY,
      _legendColumnWidths.reduce((a, b) => a + b, 0),
      _legendRowHeight
    );
  });

  //End of Summary and Legend

  //Last Content
  _tableStartY = _summaryStartY + 20;
  doc.setFont("verdana", "normal");
  doc.setFontSize(9);
  doc.text("Prepared by:", 30, _tableStartY);
  doc.text("Noted by:", 250, _tableStartY);
  _tableStartY += 30;
  doc.line(30, _tableStartY, 130, _tableStartY);
  doc.line(250, _tableStartY, 350, _tableStartY);
  _tableStartY += 20;
  doc.text("Checked by:", 30, _tableStartY);
  doc.text("Approved by:", 250, _tableStartY);
  _tableStartY += 30;
  doc.text("Mabeza, Louis Anthony E.", 30, _tableStartY);
  doc.text("Jeffrey L. Vargas", 250, _tableStartY);
  _tableStartY += 10;
  // doc.setFont("verdana_bold", "bold");
  doc.setFontSize(9);
  doc.text("Human Resource Specialist", 30, _tableStartY);
  doc.text("Acting Manager, AGSD", 250, _tableStartY);

  //End of Last Content

  //Footer
  doc.setDrawColor(122, 173, 113);
  doc.line(30, 750, 582, 750);
  doc.setFontSize(9);
  doc.setTextColor("#7aad71");
  doc.setFont("verdana", "normal");
  doc.text(
    "24th Floor LBP Plaza, 1598 M.H. Del Pilar corner Dr. J. Quintos Streets, Malate Manila; Tel. Nos. 8405-7402/8528-8589",
    306,
    760,
    { align: "center" }
  );
  doc.text(
    "Mobile Nos. 09859011590; website: www.lbpresources.com; email: customerservice@lbpresources.com ",
    306,
    770,
    { align: "center" }
  );
  doc.setDrawColor(0, 0, 0);

  //End Footer
};
