<?php
$DB_host = "mysql-medicspot.ckkrbqko8mjc.eu-west-2.rds.amazonaws.com:3306";
$DB_user = "medicspot_db";
$DB_pass = "Ucy79?l8";
$DB_name = "medicspot_new";
 
 try
 {
     $db_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }
 
$stmt=$db_con->prepare("SELECT * FROM `ea_appointments` AS a INNER JOIN `ea_users` as u ON a.id_users_customer = u.id WHERE a.start_datetime LIKE '2018-04-03%'");
$stmt->execute();


$columnHeader ='';
$columnHeader = "Email"."\t"."Phone Number"."\t"."Clinic Description"."\t"."Page Title"."\t"."Meta Title"."\t"."H1 Title"."\t"."Meta Keywords"."\t"."Meta Description"."\t";


$setData='';

while($rec =$stmt->FETCH(PDO::FETCH_ASSOC))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Clinics.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n".$setData."\n";

?>