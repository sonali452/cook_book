<?php
session_start();
?>


<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
include 'includes/dbh.inc.php';
?>

<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>



<?php


// File upload path
$targetDir = "picUpload/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 

if(isset($_POST['upload'])){


 $dish=$_POST['dish'];
 $directions=$_POST['directions'];
 $field_values_array = $_POST['field_name'];

$usern;
$id;
$email;
 $dish_id;


     if (isset($_SESSION['userId']))
 { 
   
                  // picture upload
           // ========================
              $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = "INSERT into usersrecipe (userid,dish,directions,photo,uploaded_on) VALUES ('".$_SESSION['userId']."','$dish','$directions','".$fileName."',NOW())";
             if(!mysqli_query($conn,$insert))
             {
                 echo "not inserted";
             }
        }
        else{
            echo '<script>alert("Sorry, there was an error uploading your photo.");</script>';
            }
    }else{
        echo '<script>alert("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");</script>';
      }

        // end of pic upload
           //=================== 

      // start of ingredients upload
              // //===============================
                 $ing="INSERT INTO ingredients (userid,dish_id,ing1,ing2,ing3,ing4,ing5,ing6,ing7,ing8,ing9,ing10,ing11,ing12,ing13,ing14,ing15,ing16) VALUES ('".$_SESSION['userId']."',(SELECT dish_id FROM usersrecipe WHERE uploaded_on=NOW()),'$field_values_array[0]','$field_values_array[1]','$field_values_array[2]','$field_values_array[3]','$field_values_array[4]','$field_values_array[5]','$field_values_array[6]','$field_values_array[7]','$field_values_array[8]','$field_values_array[9]','$field_values_array[10]','$field_values_array[11]','$field_values_array[12]','$field_values_array[13]','$field_values_array[14]','$field_values_array[15]')";
               
               if(!mysqli_query($conn,$ing))
            {
                  echo("Error description: " . mysqli_error($conn));
            }

               
               // End of ingredients upload
               //===============================



      // start of video upload
      // =======================
           $maxsize = 147223601; // 147MB
   if(isset($_FILES['video']['name']) && $_FILES['video']['name'] != ''){
       $name = basename($_FILES["video"]["name"]);
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["video"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['video']['size'] >= $maxsize) || ($_FILES["video"]["size"] == 0)) {
             echo '<script>alert("File too large. File must be less than 50MB.");</script>';
          }else{
             // Upload
             if(move_uploaded_file($_FILES['video']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO videos (userid,dish_id,name,location) VALUES('".$_SESSION['userId']."',(SELECT dish_id FROM usersrecipe WHERE uploaded_on=NOW()),'".$name."','".$target_file."')";

               mysqli_query($conn,$query);
             }
          }

       }else{
          echo '<script>alert("Invalid file extension.");</script>';
       }
   }
            // end of video upload
            //=======================
  
}


       // for google users
      // ====================
     else if(isset($_COOKIE['idUsers']) && isset($_COOKIE['sess'])){
            $Controller = new Controller;
            if($Controller -> checkUserStatus($_COOKIE['idUsers'], $_COOKIE['sess']))
                  {
                  
                    $db = new Connect;
               //     // this is useful don't delete
               //  $user = $db -> prepare('INSERT INTO testuser (userid,Username,Email) SELECT idUsers,uidUsers,emailUsers FROM users where idUsers='.$_COOKIE['idUsers']);
                     
               //       $user = $db -> prepare('SELECT * FROM users where idUsers='.$_COOKIE['idUsers']);
               // $user -> execute();
               //  while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
               //    $usern=$userInfo["uidUsers"];
               //    $id=$userInfo["idUsers"];
               //    $email=$userInfo["emailUsers"];
               //    }
                   // $sql="INSERT INTO testuser (userid,Username,Email,dish) VALUES ('$id','$usern','$email','$dish')";
                   // $in=$db -> prepare($sql);
                   // $in -> execute();
                 //up to here
                 
               //print_r($field_values_array[0]);


                  // picture upload
           // ========================
              $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = "INSERT into usersrecipe (userid,dish,directions,photo,uploaded_on) VALUES ('".$_COOKIE['idUsers']."','$dish','$directions','".$fileName."',NOW())";
             if(!mysqli_query($conn,$insert))
             {
                 echo "not inserted";
             }
        }
        else{
            echo '<script>alert("Sorry, there was an error uploading your photo.");</script>';
            }
    }else{
        echo '<script>alert("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");</script>';
      }

        // end of pic upload
           //=================== 

              // start of ingredients upload
              // //===============================
                 $ing="INSERT INTO ingredients (userid,dish_id,ing1,ing2,ing3,ing4,ing5,ing6,ing7,ing8,ing9,ing10,ing11,ing12,ing13,ing14,ing15,ing16) VALUES ('".$_COOKIE['idUsers']."',(SELECT dish_id FROM usersrecipe WHERE uploaded_on=NOW()),'$field_values_array[0]','$field_values_array[1]','$field_values_array[2]','$field_values_array[3]','$field_values_array[4]','$field_values_array[5]','$field_values_array[6]','$field_values_array[7]','$field_values_array[8]','$field_values_array[9]','$field_values_array[10]','$field_values_array[11]','$field_values_array[12]','$field_values_array[13]','$field_values_array[14]','$field_values_array[15]')";
               
               if(!mysqli_query($conn,$ing))
            {
                  echo("Error description: " . mysqli_error($conn));
            }

               
               // End of ingredients upload
               //===============================
                                    


      // start of video upload
      // =======================
           $maxsize = 147223601; // 147MB
   if(isset($_FILES['video']['name']) && $_FILES['video']['name'] != ''){
       $name = basename($_FILES["video"]["name"]);
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["video"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['video']['size'] >= $maxsize) || ($_FILES["video"]["size"] == 0)) {
             echo '<script>alert("File too large. File must be less than 50MB.");</script>';
          }else{
             // Upload
             if(move_uploaded_file($_FILES['video']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO videos (userid,dish_id,name,location) VALUES('".$_COOKIE['idUsers']."',(SELECT dish_id FROM usersrecipe WHERE uploaded_on=NOW()),'".$name."','".$target_file."')";

               mysqli_query($conn,$query);
             }
          }

       }else{
          echo '<script>alert("Invalid file extension.");</script>';
       }
   }
            // end of video upload
            //=======================
  


              }
            }



}
      header("Location: uploadRecipes.php?upload=success");
          exit();
?>

