<?php 

$stu_id = $_GET['id'];

include 'config.php';

$sql = "DELETE FROM student WHERE sid = {$stu_id}";
// $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");
if(mysqli_query($conn, $sql)){
    echo 1;
  }else{
    echo 0;
  }
  header("Location: http://localhost/crud_html/index.php");


mysqli_close($conn);

?>