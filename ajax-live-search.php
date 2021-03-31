<?php

$search_value = $_POST["search"];

include 'config.php';


$sql = "SELECT * FROM student AS s  
WHERE s.sname LIKE '%{$search_value}%' 
OR s.saddress LIKE '%{$search_value}%' 
OR s.sclass LIKE '%{$search_value}%' 
OR s.sphone LIKE '%{$search_value}%'
OR s.scity LIKE '%{$search_value}%'
OR s.simage LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
if(mysqli_num_rows($result) > 0) {
    ?>

    
    <table cellpadding="7px" id="table-data">
        <thead>
        <!-- <th>Id</th> -->
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>City</th>
        <th>Image</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php 

            while($row = mysqli_fetch_assoc($result)){

            
        ?>
            <tr>
                <!-- <td><?php //echo $row['sid']; ?></td> -->
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['saddress']; ?></td>
                <td><?php echo $row['sclass']; ?></td>
                <td><?php echo $row['sphone']; ?></td>
                <td><?php echo $row['scity']; ?></td>
                <td><img src="<?php echo $pathImage. $row['simage']; ?>" width="100" height="100"></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'><i class="fas fa-user-edit"></i></a>
                    <a href='delete.php?id=<?php echo $row['sid']; ?>'><i class="fas fa-trash "></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
            
    </table>
    <?php }else{
        echo "<h2>No Record Found</h2>";
    }
?>

