<?php
include_once 'config.php';

// id=admin&passwd=0000&ver=1,0,5,588&test=0&code=0&pcode=9b671f4ba789e8ef18fa5ed34c3a5fab
$LoginID = ( isset( $_GET['id'] )     ) ? $_GET['id']     : $_POST['id']     ;
$PASSWD  = ( isset( $_GET['passwd'] ) ) ? $_GET['passwd'] : $_POST['passwd'] ;
$VER     = ( isset( $_GET['ver'] )    ) ? $_GET['ver']    : $_POST['ver']    ;
$TEST    = ( isset( $_GET['test'] )   ) ? $_GET['test']   : $_POST['test']   ;
$CODE    = ( isset( $_GET['code'] )   ) ? $_GET['code']   : $_POST['code']   ;
$PCODE   = ( isset( $_GET['pcode'] )  ) ? $_GET['pcode']  : $_POST['pcode']  ;
$LoginIP = $_SERVER['REMOTE_ADDR']                                           ;
$NATION  = $_GET['nation']                                                   ;

if ( $LoginID == "" ) die('-1|-2|-1');
if ( $PASSWD == "" ) die('-2|-2|-2');
if ( $NATION == "" ) die('-1|-3|-1');
// Too lazy to do regexp for version, imma skip it -> die('-1|-4|-1');
if ( $PCODE   == "" )  die('-1|-5|-1');
if ( $VER == "" )  die('-1|-4|-1');

# Calling the login procedure through ODBC
$SQLCMD = "SET NOCOUNT ON; DECLARE @USER_ID int=-1,@SESS_ID char(36)=REPLICATE(' ',36),@RUN_VER varchar(30)=REPLICATE(' ',30),@BILL_NO int=-1,@GRADE tinyint=0,@RET int=-1; EXEC dbo.ROHAN4_Login ?,?,?,?,?,?,?,@USER_ID OUTPUT,@SESS_ID OUTPUT,@RUN_VER OUTPUT,@BILL_NO OUTPUT,@GRADE OUTPUT,@RET OUTPUT; SELECT @USER_ID AS USER_ID,@SESS_ID AS SESS_ID,@RUN_VER AS RUN_VER,@GRADE AS GRADE,@RET AS RET;";
$SQLCONN = odbc_connect($MSSQL_CONNECT_STRING,$MSSQL_USER,$MSSQL_PASS);
if($SQLCONN == false) die(-1000);
$RES = odbc_prepare($SQLCONN,$SQLCMD);
$SQL_PARAMS = array($LoginID,md5($PASSWD),$NATION,$VER,$TEST,$LoginIP,$CODE);
if($RES == false || !odbc_execute($RES,$SQL_PARAMS)) die(-1000);
$ROW = odbc_fetch_array($RES);
if($ROW == false) die(-1000);
$SESS_ID = $ROW['SESS_ID'];
$USER_ID = $ROW['USER_ID'];
$RUN_VER = $ROW['RUN_VER'];
$GRADE = $ROW['GRADE'];
echo join('|',array($SESS_ID,$USER_ID,$RUN_VER,$GRADE,$CODE));
?>
