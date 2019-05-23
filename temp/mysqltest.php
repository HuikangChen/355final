<?php
/*
$con=mysqli_init(); 

//mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL);

mysqli_real_connect($con, "csci355-mysql.mysql.database.azure.com", "csci355admin@csci355-mysql", {your_password}, {your_database}, 3306);
*/

$host = 'csci355-mysql.mysql.database.azure.com';
$username = 'csci355admin@csci355-mysql';
$password = 'csci_355';
$db_name = 'gamecompany';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
print("connection established!\n");
// Run the create table query
if (mysqli_query($conn, '
DROP TABLE Products);')) {
printf("Table dropped!\n");
} else{print("table was not dropped\n");}

//Close the connection
mysqli_close($conn);
print("connection closed successfully!\n");
?>
