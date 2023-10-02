
            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] !="")
            {
                echo "<h2>" .$_SESSION['success']."</h2>";
                unset($_SESSION['success']);
            }
            ?>

<td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['password']; ?></td>
                                <td><?php  echo $row['usertype']; ?></td>
                                <td>



                                    <td>
                                    <form action="register_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                                </tr>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="css/sb-admin-2.css" rel="stylesheet">



    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }


    <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>






<footer class="bg-blue">
                <div class="py-6 bg-gray">
                    <div class="container text-md-left">
                        <div class="row text-md-left">
                           <div class="col-lg-4 mb-5 mb-lg-0">
                               <div class="fw-bold"> Ready to cook?</div>
                               <p class="mb-3"> Sign-up for our weekly newsletters!</p>
                               <form>
                                   <div class="input-group mb-3">
                                       <input class="form-control" type="email" placeholder="Your Email Address">
                                       <button class="btn btn-outline-dark" type="submit"><i class="fab fa-telegram-plane text-lg"></i></button>
                                   </div>
                               </form>
                               <div class="fw-bold"> Lets be Friends
                               <ul class="list-inline">
                                    <li class="list-inline-item">
                                       <a href="insta" class="btn-floating btn-sm" style="font-size: 23px;"><i class="fab fa-instagram"></i></a>
                                   </li>

                                    <li class="list-inline-item">
                                       <a href="insta" class="btn-floating btn-sm" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
                                   </li>

                                    <li class="list-inline-item">
                                       <a href="insta" class="btn-floating btn-sm" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
                                   </li>
                               </ul></div>
                           </div> 

                            <div class="col-lg-4 mb-5 mb-lg-0 text-center">
                               <p class="mb-3 fw-bold">Recipes</p>
                               <p class="mb-3 fw-bold">Recipes</p>
                               <p class="mb-3 fw-bold">Recipes</p>
                               <p class="mb-3 fw-bold">Recipes</p>
                              

                           </div> 
                        </div>
                    </div>
                    
                </div>
                
            </footer>