<?php
require('top.php');

?>
<body>
<center>
    <form action = "" method="POST" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <th> ID </th>
                    <th> firstname </th>
                    <th> lastname </th>
                    <th> nic </th>
                    <th> driver_license </th>
                    <th> mobile_number </th>
                    <th> username </th>
                    <th> vehical_category_id </th>
                    <th> vehical_detail_id </th>
                    <th> branch_id </th>
                    <th> status </th>
</tr>
</thead>
<?php
$results_per_page = 2;

$query = "SELECT * FROM `driver`";
$query_run = mysqli_query($conn,$query);
$number_of_result = mysqli_num_rows($query_run);
$number_of_page = ceil ($number_of_result / $results_per_page);
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  
$page_first_result = ($page-1) * $results_per_page;
$query = "SELECT *FROM driver LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  
while($row = mysqli_fetch_assoc($query_run)){
    ?>
    <tr>
        
        <td> <?php echo $row['id'] ?> </td>
        <td> <?php echo $row['firstname'] ?> </td>
        <td> <?php echo $row['lastname'] ?> </td>
        <td> <?php echo $row['nic'] ?> </td>
        <td> <?php echo $row['driver_license'] ?> </td>
        <td> <?php echo $row['mobile_number'] ?> </td>
        <td> <?php echo $row['username'] ?> </td>
        <td> <?php echo $row['vehical_category_id'] ?> </td>
        <td> <?php echo $row['vehical_detail_id'] ?> </td>
        <td> <?php echo $row['branch_id'] ?> </td>
        <td> <?php echo $row['status'] ?> </td>
    



         
    
    
    
    </tr>

    <?php
}
for($page = 1; $page<= $number_of_page; $page++) {  
    echo '<a href = "index2.php?page=' . $page . '">' . $page . ' </a>';  
}  
?>

</table>
</form>
</center>
</body>
</html>
