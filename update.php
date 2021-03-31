<?php include 'header.php'; 

?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php 
        if(isset($_POST['showbtn'])){
        $conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

        $stu_id = $_POST['sid'];

        $sql = "SELECT * FROM student WHERE sid = {$stu_id}";

        $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
    ?>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?php echo $row['sid']; ?>" />
            <input type="text" name="sname" value="<?php echo $row['sname']; ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['saddress']; ?>" />
        </div>
        <div class="form-group">
        <label>Class</label>
        <?php 
          $sql1 = "SELECT * FROM student";
          $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessfull");

            if(mysqli_num_rows($result1) > 0) {
                echo "<select name='sclass'>";
            while($row1 = mysqli_fetch_assoc($result1)){
                if($row['sclass']){
                    $select = "selected";
                }else{
                    $select = "";
                }   
          
            echo "<option {$select} value='{$row1["sclass"]}'></option>";
            }
          echo "</select>";
        }
          ?>

        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['sphone']; ?>" />
        </div>
        <div class="file-upload">
            <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $row['simage']; ?>"/>
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="scity" value="<?php echo $row['scity']; ?>" />
        </div>
    <input class="submit" type="submit" name="submit" value="Update"  />
    </form>
    <?php 
            }
        }
    }?>
</div>
</div>
</body>
</html>
