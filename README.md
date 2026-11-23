# Rohan local private server setup

This repository contains the XAMPP `htdocs` files (excluding XAMPP's `default` folder and local `.bak` backups), plus a registry template and client launch script. It does **not** contain the game server executables, the full game client, or SQL backup files; keep those in your local licensed installation.

## SQL Server reference used for this setup

On the Apple Silicon Mac, Windows 11 ARM64 runs in Parallels. The SQL Server installer/scripts we used are from [jimm98y/MSSQLEXPRESS-M1-Install](https://github.com/jimm98y/MSSQLEXPRESS-M1-Install). Its README lists Windows 11 ARM64 and SQL Server 2019/2022 Express and Developer installers/scripts.

This machine was set up with SQL Server **Developer Edition (64-bit)**, instance `SQLDEVELOPER` (connect locally as `.\SQLDEVELOPER`). Developer Edition is for development and testing; choose an appropriately licensed edition for a live service.

## Step-by-step: run locally

### 1. Prepare Windows and the local files

1. Start the Windows 11 VM in Parallels.
2. Install XAMPP, Microsoft ODBC Driver 17 for SQL Server, and the PHP ODBC extension. After changing `php.ini`, restart Apache.
3. Keep the complete server package and client files in their own local folders. This repository does not include those executables or assets.
4. Clone/download this repository. Copy the **contents of its `htdocs` folder** into `C:\xampp\htdocs`, keeping the existing XAMPP `default` folder if you use it.

### 2. Set up SQL Server

1. Start the SQL Server instance `SQLDEVELOPER`.
2. Restore the ten matching database backups from your local `database-104905\BakFile` folder: `RohanCode`, `RohanGame`, `RohanMall`, `RohanManage`, `RohanPoint`, `RohanStat`, `RohanTrade`, `RohanUser`, `RohanWeb`, and `RohanWork`. The backups are not in this repository.
3. Configure the SQL login you will use and make sure it has access to those databases. Do not put a real password in this public repository.

### 3. Fill in local connection settings

The following files have `CHANGE_ME` placeholders:

- `htdocs/Member/config.php`
- `htdocs/RohanAuth/config.php`
- `ROHAN/rohan-reg/rohan.reg`

Replace the placeholders on your local copy with the SQL username/password and instance settings for your VM. The checked-in files are templates and will not connect until configured. Keep real credentials out of commits and logs.

### 4. Import the registry template

1. Edit `ROHAN/rohan-reg/rohan.reg` locally with the correct paths and credentials.
2. Import it into the Windows registry (run Registry Editor as Administrator if Windows requests elevation).

### 5. Start the Rohan server services

From the full local server package, start these programs and wait for each to initialize before starting the next:

1. `Fairy\DBServer\DBServerT.exe`
2. `Fairy\Logserver\LogServer.exe`
3. `Fairy\AIServer\AIServer.exe`
4. `Fairy\AgentServer\AgentServer.exe`
5. `Fairy\MapID\MapID.exe`

MapID needs DBServer and LogServer to be reachable. If MapID logs `Can't Connect DBServer` or `LogServer: fail to connect`, check that those services are still running and review their logs before retrying MapID. Wait until MapID reports that the server is ready.

### 6. Start the website and create an account

1. Open XAMPP Control Panel and start Apache.
2. Open `https://127.0.0.1/Member/` in the Windows VM and create a local game account. If the browser warns about the local HTTPS certificate, that is expected for a self-signed local certificate.

### 7. Launch the game client

1. Copy `ROHAN\RohanBloodFeud-104905\Start.cmd` into the full local client folder beside `rohanclient.exe`.
2. For this same-computer setup, the script uses `DNS=127.0.0.1` and `NATION=US`. Change DNS if the server address changes.
3. Run `Start.cmd` and log in with the account you created.

## Local-only security notes

The registration CAPTCHA and SMS verification were changed for this local setup. Do not expose this website or server to the public internet in this state. Restore appropriate account protections, review the SQL permissions, and use unique credentials before hosting for other players.

