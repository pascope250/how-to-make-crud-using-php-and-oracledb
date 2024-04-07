<?php

// Replace with your Oracle database credentials
$username = 'admin';
$password = 'admin123';
$connectionString = '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=localhost)(PORT=1521)))(CONNECT_DATA=(SID=shop)))';

$conn = oci_connect($username, $password, $connectionString);

if (!$conn) {
  $m = oci_error();
  echo 'Connection error: ' . $m['message'] . "\n";
  exit;
}
//  else {
//   echo 'Successfully connected to Oracle!';
// }



?>
