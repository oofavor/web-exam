
<?php 
define('DB_HOST', '109.172.88.6'); //Адрес
define('DB_PORT', 3306); //Имя пользователя
define('DB_USER', 'gen_user'); //Имя 
define('DB_PASSWORD', 'sd4+n7~9s1P43y'); //Пароль
define('DB_NAME', 'default_db'); //Имя БД

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
if ($mysql->connect_errno) {
}
?>