<?php

$search_value = $_POST["search"];

$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

$sql = "SELECT * FROM student AS s  
WHERE s.sname LIKE '%{$search_value}%' 
OR s.saddress LIKE '%{$search_value}%' 
OR s.sclass LIKE '%{$search_value}%' 
OR s.sphone LIKE '%{$search_value}%'
OR s.scity LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
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
                <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
                    <a href='delete.php?id=<?php echo $row['sid']; ?>'>Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
            
    </table>
    <?php }else{
        echo "<h2>No Record Found</h2>";
    }

?>
