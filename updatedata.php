<?php 

  include 'config.php';

    $stu_id = $_POST['sid'];
    $stu_name = $_POST['sname'];
    $stu_address = $_POST['saddress'];
    $stu_class = $_POST['sclass'];
    $stu_phone = $_POST['sphone'];
    $stu_city = $_POST['scity'];
    $imagename = $_FILES['fileToUpload'] ['name']; 
    $tempname = $_FILES['fileToUpload']['tmp_name']; 
    $uploadfile = $_SERVER['DOCUMENT_ROOT']. '/crud_html/uploads/'.$imagename;
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile);

  $sql = "UPDATE student SET 
    sname = '{$stu_name}',
    saddress = '{$stu_address}',
    sclass = '{$stu_class}',
    sphone = '{$stu_phone}', 
    simage = '{$imagename}', 
    scity = '{$stu_city}'  
    WHERE sid = {$stu_id}";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");

  header("Location: http://localhost/crud_html/index.php");

  mysqli_close($conn);

?>