<?php
require('top.php');
require('connection.php');
require('functions.php');

$sql="select * from driver";
$res=mysqli_query($conn,$sql);



?>

<div class="body">
    <div class="container">
        <div class="driver_table">
            <h2>A basic HTML table</h2>

            <table id="drivers">
                <tr>
                    <th class="serial">#</th>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>NIC</th>
                    <th>Username</th>
                    <th>Avatar</th>
                    <th>Type</th>
                    <th>Vehical Number</th>
                    <th>Date Joined</th>
                </tr>
                <?php
                    $i=1;
                    while($row=mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td class="serial"><?php echo $i ?></td>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['firstname']?></td>
                    <td><?php echo $row['lastname']?></td>
                    <td><?php echo $row['nic']?></td>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['avatar']?></td>
                    <td><?php echo $row['vehical_detail_id']?></td>
                    <td><?php echo $row['vehical_category_id']?></td>
                    <td><?php echo $row['date_added']?></td>
                    
                <?php }?>
            </table>

            <p>To undestand the example better, we have added borders to the table.</p>
        </div>
    </div>
</div>
