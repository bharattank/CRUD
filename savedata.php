<?php 
  $stu_name = $_POST['sname'];
  $stu_address = $_POST['saddress'];
  $stu_class = $_POST['sclass'];
  $stu_phone = $_POST['sphone'];
  $stu_img = $_POST['fileToUpload'];
  $stu_city = $_POST['scity'];

  $conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

  $sql = "INSERT INTO student (sname,saddress,sclass,sphone,scity,simage) VALUES ('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}','{$stu_city}','{$stu_img}')";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");

  header("Location: http://localhost/crud_html/index.php");

  mysqli_close($conn);


?>