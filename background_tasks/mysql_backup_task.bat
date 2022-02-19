@ECHO OFF

set TIMESTAMP=%DATE:~10,4%%DATE:~4,2%%DATE:~7,2%

"C:\wamp\bin\mysql\mysql5.7.14\bin\mysqldump.exe" --databases nsmdih_cms_db --result-file="C:\wamp\www\nsmdih_cms\database\backups\backup.%TIMESTAMP%.sql" --user=root --password=secret123

C:
CD C:\wamp\www\nsmdih_cms\database\backups

MAKECAB "backup.%TIMESTAMP%.sql" "backup.%TIMESTAMP%.sql.cab"

DEL /q /f "backup.%TIMESTAMP%.sql"

