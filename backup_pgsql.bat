@echo off
:: === Konfigurasi ===
set PGPASSWORD=rSSlqvjDtoxQOiFRIdHYoYTRpQKmEtCV
set HOST=interchange.proxy.rlwy.net
set PORT=50576
set USER=postgres
set DB=railway
set REMOTE=gdrive:/backup_postgres
set BACKUP_FILE=backup_%DATE:~6,4%-%DATE:~3,2%-%DATE:~0,2%.sql

:: === Backup PostgreSQL ===
echo Membuat backup PostgreSQL...
pg_dump -h %HOST% -p %PORT% -U %USER% -d %DB% -F c -b -v -f %BACKUP_FILE%

:: === Upload ke Google Drive dengan rclone ===
echo Upload ke Google Drive...
rclone copy %BACKUP_FILE% %REMOTE% --progress

:: === Hapus file lokal jika sudah terupload ===
del %BACKUP_FILE%

:: === Hapus backup lama (lebih dari 7 hari) di Google Drive ===
echo Menghapus backup lebih dari 7 hari di Google Drive...
rclone delete %REMOTE% --min-age 7d
rclone rmdirs %REMOTE% --leave-root

echo Backup selesai!
pause
