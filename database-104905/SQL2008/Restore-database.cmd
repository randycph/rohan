@echo off
color 0a
title Import Rohan Database

set PW=CHANGE_ME
set NAMED=SQLDEVELOPER

set CUD=%~dp0
set PWD=%CUD:~0,-1%

set DBNAME=RohanCode
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

set DBNAME=RohanGame
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

set DBNAME=RohanMall
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

set DBNAME=RohanManage
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

set DBNAME=RohanPoint
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

set DBNAME=RohanStat
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

set DBNAME=RohanTrade
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

set DBNAME=RohanUser
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

set DBNAME=RohanWeb
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

set DBNAME=RohanWork
sqlcmd -S .\%NAMED% -U sa -P %PW% -i %PWD%/%DBNAME%.sql

echo Import Rohan Database Succeeded.
pause
