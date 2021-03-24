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
        $conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

        $sql = "SELECT * FROM student JOIN studentclass  WHERE student.sclass = studentclass.cid LIMIt {$offset}, {$limit}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");
      
        if(mysqli_num_rows($result) > 0) {
    ?>


    <table cellpadding="7px">
        <thead>
        <!-- <th>Id</th> -->
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
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
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['sphone']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
                    <a data-id="{$row['sid']}" class="delete-btn">Delete</a>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td id="table-data">
                </td>
            </tr>
        </tbody>
            
    </table>
    <div id="error-message"></div>
    <div id="success-message"></div>
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
                 $("#table-data").html(data);
                }
            });
        });
        // Delete Record
        $(document).on("click",".delete-btn", function(){
            if(confirm("Do you really want to delete this record ?")){
                var studentId = $(this).data("sid");
                var element = this;

                $.ajax({
                    url: "ajax-delete.php",
                    type : "POST",
                    data : {id : studentId},
                    success : function(data){
                        if(data == 1){
                        $(element).closest("tr").fadeOut();
                        }else{
                        $("#error-message").html("Can't Delete Record.").slideDown();
                        $("#success-message").slideUp();
                        }
                     }
                });
            }
        }); 
    });


</script>
</body>
</html>
