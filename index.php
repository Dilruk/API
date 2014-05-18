<?php
// Turn off all error reporting
error_reporting(0);

include("/PHPScripts/dbInsert.php"); 
$se = new dbInsert();
$se->insertToDB();

?>

