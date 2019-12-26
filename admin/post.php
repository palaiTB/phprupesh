<?php
   include("config.php");
   session_start();
   $error = "Please Enter your mobile number and password to login !!!";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      
      // username and password sent from form 
      
      //$myusername = mysqli_real_escape_string($db,$_POST['mobile']);
      //$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $date = date('d-m-Y', strtotime($_POST['day']));
      $question = $_POST['question'];
      $opt1=$_POST['opt1'];
      $opt2=$_POST['opt2'];
      $opt3=$_POST['opt3'];
      $opt4=$_POST['opt4'];
      $opt5=$_POST['opt5'];
      $opt6=$_POST['opt6'];
      

      echo $date . $question . $opt1 . $opt2 . $opt3 . $opt4 . $opt5 . $opt6;

      if($opt4)
      {
         echo "Working";
      }else {
         # code...
         echo "Not Set";
      }

      $sql = "insert into questions(date,question,option1,option2,option3,option4,option5,option6) values(str_to_date('$date','%d-%m-%Y'),'$question','$opt1','$opt2','$opt3','$opt4','$opt5','$opt6')";

      if(mysqli_query($db, $sql)){
               echo "Records inserted successfully to Questions.";

               $sql_fetch = "select * from questions order by question_no desc limit 1";

               $result = mysqli_query($db, $sql_fetch);

               $row = mysqli_fetch_assoc($result);

               $a1 = $row["question_no"];
               $a2 = $row["date"];

               echo $a1 . $a2;
               //echo $a2;

               $sql_vote = "insert into votes(question_no) values($a1)";
               if(mysqli_query($db,$sql_vote))
               {
                  echo "successfully Inserted to votes";
               }else{
                  echo "ERROR: Could not able to execute $sql_vote. " . mysqli_error($db);
               }

               header("location: index.php");
         }
      } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
      }
      
   
?>