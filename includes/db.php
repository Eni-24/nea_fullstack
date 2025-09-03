<?php
define('DB_SERVER', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");
define('DB_NAME', "nea");

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$connection) {
  die("Connection Failed!: ".mysqli_connect_error());
}

?>
