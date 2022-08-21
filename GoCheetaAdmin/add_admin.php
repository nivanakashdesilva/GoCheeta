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
        <h2>Admin User Registation</h2>
            <form action="update_admin.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    
                    <input class="form-control" placeholder="Username" type="text" name="username" value="<?php echo $username; ?>"required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Email" type="text" name="email" value="<?php echo $email; ?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Password" type="text" name="password" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Confirm Password" type="text" name="password_2" required>
  	            </div>
                  <input class="btn submit" type="submit" name="create" value="Register">
            </form>

        </div>
    </div>
</div>