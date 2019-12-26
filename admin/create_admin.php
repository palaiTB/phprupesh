<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      
      // username and password sent from form 
      
      //$myusername = mysqli_real_escape_string($db,$_POST['mobile']);
      //$mypassword = mysqli_real_escape_string($db,$_POST['password']); 


      $name=$_POST['name'];
      $mobile=$_POST['mobile'];
      $psw=$_POST['psw'];
      

      echo  $name . $mobile . $psw;

      


      $sql = "insert into admin(mobile,password,name) values($mobile,'$psw','$name')";

      if(mysqli_query($db, $sql)){
               echo "Records inserted successfully to Questions.";

               

               header("location: index.php");
         }

         
      } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
      }
      
   
?>