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
$data = json_decode(file_get_contents("php://input"), true);
$task = $data['task'];

$sql = "INSERT INTO tasks (task) VALUES ('$task')";
$result=mysqli_query($conn,$sql);

if ($result) {
    echo json_encode($task);
} else {
    echo "error happended";
}

$conn->close();
?>
