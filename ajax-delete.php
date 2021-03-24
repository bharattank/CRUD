<?php

$student_id = $_POST["id"];


$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");


$sql = "DELETE FROM student WHERE sid = {$student_id}";
echo $sql;
exit;
if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>