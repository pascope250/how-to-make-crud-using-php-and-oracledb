# how-to-make-crud-using-php-and-oracledb
learn how to connect oracle db to php using Oracle instant client

# all steps i used to connect

1.install oracle correctly
===========================

2. create user

2.1. SELECT users
  ->select username, created, account_status from dba_users;
  -> create user [username] identified by [passwoword];
  -> GRANT CREATE SESSION TO [USERNAME];
  -> GRANT ALL PRIVILEGES TO [USERNAME];
  -> SHUTDOWN
  -> STARTUP
  -> sqlplus / as sysdba
  -> connect [username]/[password]


SECOND STEP
.................................

-> Download Oracle instant client on link below
-> https://docs.oracle.com/en/database/oracle/oracle-database/21/lacli/installing-instant-client-light.html
-> after download, extract it.
-> copy all files with .dll extention and paste it into C:\xampp\php and in C:\xampp\apache\bin
-> open php.ini located in C:\xampp\php and enable (extension=oci8_12c) by removing semi colon.
->restart your apache


# use this as sample to make connection in php

<?php

// Replace with your Oracle database credentials
$username = 'your_username';
$password = 'your_password';
$connectionString = '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=your_host)(PORT=your_port)))(CONNECT_DATA=(SID=your_sid)))';

$conn = oci_connect($username, $password, $connectionString);

if (!$conn) {
  $m = oci_error();
  echo 'Connection error: ' . $m['message'] . "\n";
  exit;
} else {
  echo 'Successfully connected to Oracle!';
}

oci_close($conn);  // Close the connection

?>




***************************************
# AFETR THIS IF YOUR'RE FACING WITH ISSUES OF LISTENER WHICH IS NOT FOUNT TRY THOSE steps

///////////////////////////////////////////////////////////////////////////////////////

-> Check listener status ----> lsnrctl status   '
-> if is not found, use ===>lsnrctl statrt    ' |  '
                                             '  |  '
                                            '_ _'_ _'

                                            Everthing you run in command prompt try to run as 
                                            administrator!


                

                * * * * * * * * * *
                *  HAPPY CODING   *
                *                 *
                *                 *
                * * * * * * * * * *
                *
                *
                *
                *
                *
                *


