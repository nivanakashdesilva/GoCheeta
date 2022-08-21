<?php
require('top.php');
?>
<style>
    body{
        height: 100%;
    }
</style>
<div class="body font-poppin bg-gra-01 p-t-100 p-d-180px ">
  <div class="wrapper wrapper--w780 p-d-20"> 
    <div class="card card-3">
        
        <div class="card-body">
        <h2>Vehical Category Registation</h2>
            <form action="update_vehical_category.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    
                    <input class="form-control" placeholder="Vehical Category Name" type="text" name="category" required>
  	            </div>
                  <input class="btn submit" type="submit" name="create" value="Register">
            </form>

        </div>
    </div>
</div>