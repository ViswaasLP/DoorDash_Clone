
    <?php include("partials/menu.php");?>
    
    <!-- main section begins here -->
    <div class="main">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>
            <?php 
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
            <br><br>
            <a href="/admin/add-admin.php" class="btn-primary">Add Admin</a>
            <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Actions</th>

                </tr>
                <?php
                    $sql = 'SELECT * FROM tbl_admin';
                    $res = mysqli_query($conn,$sql);

                    if($res==TRUE){
                        $count = mysqli_num_rows($res);
                        $flag=1;
                        if($count>0){
                            //Data is present in the database.
                            while($rows=mysqli_fetch_assoc($res)){
                                //Using while loop to get all the data from the database. Loops as long as data is present.

                                $id=$rows['id'];
                                $name=$rows['full_name'];
                                $user=$rows['username'];
                                
                                ?>
                                <tr>
                                    <td><?php echo $flag++; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $user; ?></td>
                                    <td>
                                        <a href="#" class="btn-secondary">Update</a>
                                        <a href="#" class="btn-danger">Delete</a>

                                    </td>

                                </tr>
                                <?php

                            }
                        }else{
                            //Data does not exist in the database.
                        }
                    }
                ?>

            </table>
        </div>
    </div>
    <!-- main section ends here -->

    <!-- footer section begins here -->
    <?php include("partials/footer.php");?>
    <!-- footer section ends here -->
