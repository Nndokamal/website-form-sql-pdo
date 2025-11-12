<?php
function koneksidatabase(){
$servername = "localhost";
$port = 3306;
$database = "sqlnando";
$username = "root";
$password = "";
return new PDO("mysql:host=$servername:$port;dbname=$database", $username, $password);
}

?>