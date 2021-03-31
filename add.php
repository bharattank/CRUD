<?php include 'header.php'; 
    include 'config.php';
if(isset($_POST['submit']))
{
    $stu_name = $_POST['sname'];
    $stu_address = $_POST['saddress'];
    $stu_class = $_POST['sclass'];
    $stu_phone = $_POST['sphone'];
    $stu_city = $_POST['scity'];
    $imagename = $_FILES['fileToUpload'] ['name']; 
    $tempname = $_FILES['fileToUpload']['tmp_name']; 
    $uploadfile = $_SERVER['DOCUMENT_ROOT']. "/crud_html/uploads/".$imagename;
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile);
    $sql = "INSERT INTO `student`(`sname`, `saddress`, `sclass`, `sphone`, `simage`, `scity`)
    VALUES ('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}','{$imagename}','{$stu_city}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");
}

?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
                <option value="" selected disabled>Select Class</option>
                <option value="BscIT">BscIT</option>
                <option value="BCA">BCA</option>
                <option value="BTECH">BTECH</option>
                <option value="Bsc">Bsc</option>

            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="scity" />
        </div>
        <div class="file-upload">
            <input type="file" name="fileToUpload" id="fileToUpload"/>
        </div>
        <input class="submit" type="submit" name="submit" value="Save" />
    </form>
</div>
</div>
</body>

</html>