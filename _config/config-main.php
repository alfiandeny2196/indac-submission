<?php
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE_NAME", "submission");
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

define("DB_HOST2", "192.168.5.9");
define("DB_USERNAME2", "indasoft");
define("DB_PASSWORD2", "DB@1nd4c0");
define("DB_DATABASE_NAME2", "indasoft-db");
$conn2 = new mysqli(DB_HOST2, DB_USERNAME2, DB_PASSWORD2, DB_DATABASE_NAME2);
if ($conn2->connect_error) {
  die("Connection failed: " . $conn2->connect_error);
}


?>