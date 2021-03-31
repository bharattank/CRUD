<?php
include 'header.php';
$limit = 5;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$offset = ($page - 1) * $limit;
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php 
        include 'config.php';

        $sql = "SELECT * FROM student WHERE student.sid LIMIt {$offset}, {$limit}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");
      
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
                <!-- <td><?php echo $row['sid']; ?></td> -->
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['saddress']; ?></td>
                <td><?php echo $row['sclass']; ?></td>
                <td><?php echo $row['sphone']; ?></td>
                <td><?php echo $row['scity']; ?></td>
                <td><img src="<?php echo $pathImage. $row['simage']; ?>" width="100" height="100"></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'><i class="fas fa-user-edit"></i></a>
                    <a href='delete.php?id=<?php echo $row['sid']; ?>'><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
    
    <?php }else{
        echo "<h2>No Record Found</h2>";
    }

    $sql1 = "SELECT * FROM student";
    $result1 = mysqli_query($conn, $sql1) or die ("Query Failed. ");

    if(mysqli_num_rows($result1) > 0){

         $total_records = mysqli_num_rows($result1);
       
        $total_page = ceil($total_records / $limit);

        echo '<ul class="pagination admin-pagination">';
        if($page > 1){
            echo '<li><a href="index.php?page='.($page - 1).'">Prev</a></li>';
        }
        
        for($i = 1; $i <= $total_page; $i++){
            if($i == $page){
                $active = "active";
            }else{
                $active = "";
            }
            echo '<li class="'.$active.'"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page > $page){
            echo '<li><a href="index.php?page='.($page + 1).'">Next</a></li>';
        }
        
        echo '</ul>';
    }


    mysqli_close($conn);
    ?>
</div>
</div>

<script src="./js/jquery.js"></script>


<script>
$(document).ready(function(){
// Live Search
    $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "ajax-live-search.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").empty().html(data);
         }
       });
    });
});

</script>

</body>
</html>
