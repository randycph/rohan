@echo off
REM DANGER: This script drops all ten Rohan databases. Do not run unless you intend to delete them.
color 0a
title Delete Rohan Database

set PW=CHANGE_ME
set NAMED=SQLDEVELOPER

set DBNAME=RohanCode
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

set DBNAME=RohanGame
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

set DBNAME=RohanMall
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

set DBNAME=RohanManage
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

set DBNAME=RohanPoint
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

set DBNAME=RohanStat
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

set DBNAME=RohanTrade
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

set DBNAME=RohanUser
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

set DBNAME=RohanWeb
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

set DBNAME=RohanWork
sqlcmd -S .\%NAMED% -U sa -P %PW% -Q "drop database [%DBNAME%]"

echo Delete Rohan Database Succeeded.
pause