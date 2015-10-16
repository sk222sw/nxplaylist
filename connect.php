<?php

$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "nxplaylist";
$dbport = 3306;

$conn = new mysqli($servername, $username, $password, $database, $dbport);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Id, Title from playlist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Id"] . " - Title: " . $row["Title"] . "<br />";
    } 
} else {
    echo "0 results";
}

$conn->close();