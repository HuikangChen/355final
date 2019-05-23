<?php
//DATABASE CONNECTION
//PHP Data Objects(PDO) Sample Code:
$serverName = "tcp:csci355.database.windows.net,1433";
$database = "csci355_SQL";
$username = "csci355admin";
$pwd = "csci_355";

try {
  $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $pwd);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  print("connection established.\n");

 //execute sql queries

} catch (PDOException $e) {
  print("Error connecting to SQL Server.");
  die(print_r($e));
}
// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => $username."@".$database, "pwd" => $pwd,
                        "Database" => $database, "LoginTimeout" => 30,
                        "Encrypt" => 1, "TrustServerCertificate" => 0);
$conn = sqlsrv_connect($serverName, $connectionInfo);
var_dump($connectionInfo);
