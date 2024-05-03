<?php

if (isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "candaweb";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM announcement WHERE id=$id";
    $connection->query($sql);
}

header("location:admin-announcements2.php");
exit;


?>