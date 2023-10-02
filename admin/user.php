<?php 
    
    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User List
            </h6>
        </div>
        <div class="card-body">

            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] !="")
            {
                echo "<h2> ".$_SESSION['success']."</h2>";
                unset($_SESSION['success']);
            }
            ?>

            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] !="")
            {
                echo "<h2> ".$_SESSION['status']."</h2>";
                unset($_SESSION['status']);
            }
            ?>

            <div class="table-responsive">

                <?php

                $connection = mysqli_connect("localhost","root","","cookbook_db");
                $query = "SELECT * FROM users";
                $query_run = mysqli_query($connection, $query);
                ?>
            
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Username </th>
                            <th>Email </th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                         <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                             ?>
                       
                            <tr>
                                <td><?php  echo $row['idUsers']; ?></td>
                                <td><?php  echo $row['uidUsers']; ?></td>
                                <td><?php  echo $row['emailUsers']; ?></td>
                                
                                <td>
                                     <form action="code.php" method="post">
                                        <input type="hidden" name="delete_uid" value="<?php echo $row['idUsers']; ?>">
                                        <button type="submit" name="delete_ubtn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                                
                                </tr>
                                <?php
                            }
                        }
                        else 
                        {
                            echo "No Record Found";
                        }
                                ?>
                       
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>



     

<?php 
    include('includes/scripts.php');
?>