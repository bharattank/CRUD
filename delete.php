<?php include 'header.php'; 
if(isset($_POST['delete-btn'])){
    $conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

    $stu_id = $_POST['sid'];

    $sql = "DELETE FROM student WHERE sid = {$stu_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");

    header("Location: http://localhost/crud_html/index.php");

    mysqli_close($conn);
}

?>


<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="delete-btn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
