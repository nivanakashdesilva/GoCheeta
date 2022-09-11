<style> 
 table {  
  border-collapse: collapse;  
}  
  .inline{   
      display: inline-block;   
      float: right;   
      margin: 20px 0px;   
  }   
   
  input, button{   
      height: 34px;   
  }   

.page {   
display: inline-block;
padding-left: 0;
padding-bottom: 20px;
list-style: none;
border-radius: 0.35rem;
vertical-align: middle;  
}   
.page a {   
font-weight:bold;   
font-size:18px;   
color: black;   
float: left;   
padding: 8px 16px;   
text-decoration: none;   
  
}   
.page a.active {   
background-color: #4e73df;   
}
.page a:hover{
  background-color: #8ea6ea;
  color: black ;
}  
.page a:hover:not(.active) {   
background-color: skyblue;   
}  
</style> 

<?php
include('includes/header.php'); 
include('includes/navbar.php');
if(isset($_GET['type']) && $_GET['type']!=''){
  $type=get_safe_value($conn,$_GET['type']);
  if($type=='delete'){
      $id=get_safe_value($conn,$_GET['id']);
      $delete_sql="delete from driver where id='$id'";
      mysqli_query($conn,$delete_sql);
  }
}
$sql="select * from driver order by id desc";
$res=mysqli_query($conn,$sql);
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Driver Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Driver Profile 
      <button class = "btn btn-primary" onclick="document.location='add_driver.php'">Add Driver</button>
      </h6>
    </div>
    <center> 
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> Firstname </th>
              <th> Lastname </th>
              <th> Nation ID Number </th>
              <th> Mobile Number </th>
              <th> Username </th>
              <th>VIEW </th>
              <th>EDIT </th>
              <th>DELETE </th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                $per_page_record = 10;            
                if (isset($_GET["page"])) {    
                  $page  = $_GET["page"];    
                }    
                else {    
                  $page=1;    
                }    
                $start_from = ($page-1) * $per_page_record; 
                $query = "SELECT * FROM `driver`LIMIT $start_from, $per_page_record";
                $query_run = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($query_run)){
              ?>
               <td> <?php echo $row['id'] ?> </td>
                <td> <?php echo $row['firstname'] ?> </td>
                <td> <?php echo $row['lastname'] ?> </td>
                <td> <?php echo $row['nic'] ?> </td>
                <td> <?php echo $row['mobile_number'] ?> </td>
                <td> <?php echo $row['username'] ?> </td>
                <td>
                  <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="view_btn" class="btn btn-primary"> VIEW</button>
                  </form>
                </td>
                <td><a class='btn btn-success' href="update_driver_detail.php?id=<?php echo $row['id'];?>">Update</a>

                
                <td>
                <?php
                echo "<span class='btn btn-danger'><a href='?type=delete&id=".$row['id']."'>&nbspDelete</a></span>&nbsp";
                ?>
                </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <div class="page">    
          <?php  
          $query = "SELECT COUNT(*) FROM driver";     
          $rs_result = mysqli_query($conn, $query);     
          $row = mysqli_fetch_row($rs_result);     
          $total_records = $row[0];
          echo "</br>";     
          $total_pages = ceil($total_records / $per_page_record);     
          $pagLink = "";
          if($page>=2){   
            echo "<a href='driver.php?page=".($page-1)."'>  Prev </a>";   
          }
          for ($i=1; $i<=$total_pages; $i++) {   
            if ($i == $page) {  
              $pagLink .= "<a class = 'active' href='driver.php?page="
              .$i."'>".$i." </a>";   
            }               
            else  {   
              $pagLink .= "<a href='driver.php?page=".$i."'> 
              ".$i." </a>";     
            }
          };    
          echo $pagLink;
          if($page<$total_pages){   
            echo "<a href='driver.php?page=".($page+1)."'>  Next </a>";   
          }
          ?>    
        </div>
        <div class="inline">
          <input id="page" type="number" min="1" max="<?php echo $total_pages?>"
          placeholder="<?php echo $page."/".$total_pages; ?>" required>
          <button onClick="go2Page();">Go</button>
        </div>
      </div>
    </div>
  </center>
</div>
 
  

<script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'driver.php?page='+page;   
    }   
  </script>  
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>