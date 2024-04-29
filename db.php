<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "crud_operation");

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$con) {
    die("Connection failed: ". mysqli_connect_error());
}
else {
    echo "Connected successfully";
}

?>