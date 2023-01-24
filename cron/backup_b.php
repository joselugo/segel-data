<?php

include("conexion.php");
$credencial = credencial();

$dir = "/var/www/html/herramientas/backup/";
$filename = "Mikrowisp6_backup_cron_" . date("m-d-Y") . ".sql" . ".zip";

$db_username = $credencial['user'];
$db_password = $credencial['password'];
$db_database = $credencial['database'];

$cmd = "mysqldump -u {$db_username} --password={$db_password} {$db_database} | gzip > {$dir}{$filename}";

if (!exec($cmd)) {
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    passthru("cat {$filename}");

    //print("Backup creado con exito");
} else {
    print("Error al crear backup");
}
