<?php 
 include("../conn.php");

 extract($_POST);

$company_name = strtoupper($company_name);
 $selCourse = $conn->query("SELECT * FROM company_tbl WHERE cou_name='$company_name' ");

 if($selCourse->rowCount() > 0)
 {
	$res = array("res" => "exist", "company_name" => $company_name);
 }
 else
 {
    
	$insCourse = $conn->query("INSERT INTO company_tbl(cou_name) VALUES('$company_name') ");
	if($insCourse)
	{
		$res = array("res" => "success", "company_name" => $company_name);
	}
	else
	{
		$res = array("res" => "failed", "company_name" => $company_name);
	}


 }




 echo json_encode($res);