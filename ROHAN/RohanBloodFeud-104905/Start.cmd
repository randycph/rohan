@echo off

set DNS=127.0.0.1
set NATION=US

start rohanclient.exe "https://%DNS%&1&%NATION%"
