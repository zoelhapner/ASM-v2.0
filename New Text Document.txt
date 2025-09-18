@echo off
:: === Konfigurasi ===
set PGPASSWORD=rSSlqvjDtoxQOiFRIdHYoYTRpQKmEtCV
set HOST=interchange.proxy.rlwy.net
set PORT=50576
set USER=postgres
set DB=railway
set BACKUP_FILE=backup_%DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2%.sql

:: === Backup PostgreSQL ===
echo Membuat backup PostgreSQL...
pg_dump -h %HOST% -p %PORT% -U %USER% -d %DB% -F c -b -v -f %BACKUP_FILE%

:: === Upload ke Google Drive dengan rclone ===
echo Upload ke Google Drive...
rclone copy %BACKUP_FILE% railway-backup:/backup_postgres/ --progress

:: === Hapus file lokal jika sudah terupload ===
del %BACKUP_FILE%

echo Backup selesai!
pause
