# Rohan local private server setup

This repository contains the XAMPP `htdocs` files (excluding XAMPP's `default` folder and local `.bak` backups), the `database-104905` package including its database backup files, plus a registry template and client launch script. It does **not** contain the game server executables or the full game client; keep those in your local licensed installation.

## SQL Server reference used for this setup

On the Apple Silicon Mac, Windows 11 ARM64 runs in Parallels. The SQL Server installer/scripts we used are from [jimm98y/MSSQLEXPRESS-M1-Install](https://github.com/jimm98y/MSSQLEXPRESS-M1-Install). Its README lists Windows 11 ARM64 and SQL Server 2019/2022 Express and Developer installers/scripts.

This machine was set up with SQL Server **Developer Edition (64-bit)**, instance `SQLDEVELOPER` (connect locally as `.\SQLDEVELOPER`). Developer Edition is for development and testing; choose an appropriately licensed edition for a live service.

## Step-by-step: run locally

### 1. Prepare Windows and the local files

1. Start the Windows 11 VM in Parallels.
2. Install XAMPP, Microsoft ODBC Driver 17 for SQL Server, and the PHP ODBC extension. After changing `php.ini`, restart Apache.
3. Keep the complete Rohan server package and client files in their own local folders. This repository does not include those executables or assets.
4. Clone/download this repository. Copy the **contents of its `htdocs` folder** into `C:\xampp\htdocs`, keeping XAMPP's `default` folder if you use it.

### 2. Restore the database backups

The ten backups are in `database-104905/BakFile`: `RohanCode`, `RohanGame`, `RohanMall`, `RohanManage`, `RohanPoint`, `RohanStat`, `RohanTrade`, `RohanUser`, `RohanWeb`, and `RohanWork`.

1. Start the SQL Server instance `SQLDEVELOPER`.
2. Copy the `.bak` files to a folder the SQL Server service can read. For this installation, use `C:\Program Files\Microsoft SQL Server\MSSQL16.SQLDEVELOPER\MSSQL\Backup\Rohan` (create the `Rohan` folder if needed).
3. In SQL Server Management Studio, connect to `.\SQLDEVELOPER`.
4. In Object Explorer, right-click **Databases** and choose **Restore Database…**.
5. Under **Source**, choose **Device**, click the browse button, then **Add** and select one `.bak` file.
6. Confirm the destination database name matches the backup name. On the **Files** page, use **Relocate all files to folder** or select valid data/log folders if the backup refers to paths from another computer.
7. Click **OK** to restore. Repeat steps 4–7 for each of the ten backups.
8. If a database with the same name already exists, do not overwrite it unless you intend to replace its contents; back it up first.

The `database-104905/SQL2008` folder also contains older SQL scripts. `Restore-database.cmd` runs those `.sql` scripts; it is not the procedure for restoring the `.bak` files. `database-104905/del-database.cmd` drops all ten databases—**do not run it** unless you intend to delete them. The batch files use `CHANGE_ME` instead of a real SQL password.

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
