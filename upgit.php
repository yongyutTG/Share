<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//$x = shell_exec('C:/inetpub/wwwroot/bnrwq2020/update_git.sh 2>&1');
//$x = shell_exec('/bin/sh /home/dld/update_git.sh 2>&1');

/*
shell_exec('cd /home/dld/');
$x = shell_exec('/bin/sh  update_git.sh 2>&1');
 */

//สำหรับ window server กรมปศุสัตว์

shell_exec('cd C:\Apache24\htdocs\swglocal');
shell_exec('git reset --hard HEAD');
shell_exec('git clean -f');
$x = shell_exec('git pull origin main 2>&1');

echo 'update git success<hr>';
var_dump('<pre>', $x . '</pre>');
?>