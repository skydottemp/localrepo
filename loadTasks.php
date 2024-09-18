<?php

$servername="localhost";
$username="root";
$password="";
$database="todo_db";

$conn = mysqli_connect($servername,$username,$password,$database);

if ($conn) {
   echo"";//success
}else{
    die("Connection failed: " . mysqli_connect_error($conn));

}

$sql = "SELECT task FROM tasks";
$result = mysqli_query($conn,$sql);

$tasks = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tasks[] = $row['task'];
    }
}

echo json_encode($tasks);
$conn->close();
?>
