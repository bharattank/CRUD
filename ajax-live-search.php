<?php

$search_value = $_POST["search"];

$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

$sql = "SELECT * FROM student AS s LEFT JOIN studentclass AS sc ON cid 
WHERE s.sname LIKE '%{$search_value}%' 
OR s.saddress LIKE '%{$search_value}%' 
OR s.sphone LIKE '%{$search_value}%' 
OR sc.cname LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table cellpadding="7px">
                <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Class</th>
                <th>Phone</th>
                <th>Action</th>
                </tr>';

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr>
                    <td>{$row['sid']}</td>
                    <td>{$row['sname']}</td>
                    <td>{$row['saddress']}</td>
                    <td>{$row['cname']}</td>
                    <td>{$row['sphone']}</td>
                    <td>
                        <a '{$row['sid']}'>Edit</a>
                        <a '{$row['sid']}'>Delete</a>
                    </td>
            </tr>";
            }
           
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>