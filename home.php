<?php
    session_start();

    /* Check Session CODE */

    // Header
    include("includes/header.php"); 

    // Pages
    @$page = $_GET['page'];
    if (!isset($page)) {
        include("pages/dashboard.php");
    } else {
        switch ($page) {
            case 'employee-manage':
                include("pages/employee-manage.php");
                include("modals/modal-emp-manage.php");
                break;
            case 'timekeep-record':
                include("pages/timekeep-record.php");
                include("modals/modal-tk-record.php");
                break;
            case 'timekeep-report':
                include("pages/timekeep-report.php");
                include("modals/modal-tk-report.php");
                break;
            case 'fields-department':
                include("pages/fields-department.php");
                include("modals/modal-fld-department.php");
                break;
            case 'fields-position':
                include("pages/fields-position.php");
                include("modals/modal-fld-position.php");
                break;
            case 'fields-payroll':
                include("pages/fields-payroll.php");
                include("modals/modal-fld-payroll.php");
                break;
            case 'fields-location':
                include("pages/fields-location.php");
                include("modals/modal-fld-location.php");
                break;
            case 'fields-schedule':
                include("pages/fields-schedule.php");
                include("modals/modal-fld-schedule.php");
                break;
            case 'fields-holiday':
                include("pages/fields-holiday.php");
                include("modals/modal-fld-holiday.php");
                break;
            case 'adminMng-user':
                include("pages/adminmng-user.php");
                include("modals/modal-admn-user.php");
                break;
            default:
                include("pages/404.php");
                break;
        }
    }

    // Main Modals
    include("includes/modals.php");
    // Footer
    include("includes/footer.php"); 
