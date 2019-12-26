<?php
   include("config.php");
   session_start();
   $error = "Please Enter your mobile number and password to login !!!";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['mobile']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE mobile = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      $error = "Your Login Name or Password is invalid";
      // If result matched $myusername and $mypassword, table row must be 1 row
	echo "count=";
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         echo $count;
         header('Location: index.php');
      }else {
		echo "count=" + $count;
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
         
      </style>
      
   </head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   <body bgcolor = "#FFFFFF">
  
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "mobile" class = "box" required /><br /><br />
                  <label>Password  :</label><input type = "text" name = "password" class = "box" required /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
