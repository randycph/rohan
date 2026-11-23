<?php
include_once 'config.php';
include 'sql_check.php';
include 'sql_inject.php';
include 'asql.php';

// id=admin&passwd=0000

$LoginID = ( isset( $_GET['id'] ) ) ? $_GET['id'] : $_POST['id'];
$PASSWD = ( isset( $_GET['passwd'] ) ) ? $_GET['passwd'] : $_POST['passwd'];
$LoginIP = $_SERVER['REMOTE_ADDR'];

if ( $LoginID == '') die (-99);

# calling the code procedure through ODBC
$SQLCMD = "SET NOCOUNT ON; DECLARE @RET int=-1; EXEC dbo.ROHAN3_SendCode ?,?,?,@RET OUTPUT; SELECT @RET AS RET;";
$SQLCONN = odbc_connect($MSSQL_CONNECT_STRING,$MSSQL_USER,$MSSQL_PASS);
if($SQLCONN == false) die(-1000);
$RES = odbc_prepare($SQLCONN,$SQLCMD);
$SQL_PARAMS = array($LoginID,md5($PASSWD),$LoginIP);
if($RES == false || !odbc_execute($RES,$SQL_PARAMS)) die(print_r(odbc_errormsg($SQLCONN),true));
$ROW = odbc_fetch_array($RES);
if($ROW == false) die(-1000);
$RET = $ROW['RET'];
if ($RET == -202){$RET = 0;}
echo $RET;
?>
