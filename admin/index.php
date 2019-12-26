<?php
   include('session.php');

      if(!$_SESSION['login_user']){
      	header("Location: login.php"); 
      }
       

?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin LocalWire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>
	 <h1>Welcome <?php echo $login_session; ?></h1> 

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">LocalWire</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="post_question.php">Post Question</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">        
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
        <p><a href="#">LocalWire</a></p>
        <img src="localwire.jpeg" class="img-circle" height="65" width="65" alt="Avatar">
      </div>
     
      <div class="alert alert-success fade in">
       
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Add New Admin</a></li>
      </div>
      <div class="alert alert-success fade in">
       
        <li><a href="manage_admin.php"><span class="glyphicon glyphicon-user"></span> Manage Admin</a></li>
      </div>
      
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p contenteditable="true">All Responses from Users</p>
   
                
              </button>     
            </div>
          </div>
        </div>
      </div>
      

      <?php
      //include("config.php");
		$sql = "SELECT * FROM questions order by date desc,question_no desc";
		$result = mysqli_query($db, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {

		    	$num = $row['question_no'];

		    	$sql_fetch = "select * from votes where question_no=$num";

               $result_votes = mysqli_query($db, $sql_fetch);

               $row_votes = mysqli_fetch_assoc($result_votes);

              // $a1 = $row["question_no"];
               //$a2 = $row["date"];

               $opt1 = $row["option1"];
               $res1 = $row_votes["opt1"] ; 

               $opt2 = $row["option2"];
               $res2 = $row_votes["opt2"] ; 

               $opt3 = $row["option3"];
               $res3 = $row_votes["opt3"] ; 
               if($opt3=="") $res3="";

               $opt4 = $row["option4"];
               $res4 = $row_votes["opt4"] ; 
               if($opt4=="") $res4="";

               $opt5 = $row["option5"];
               $res5 = $row_votes["opt5"] ; 
               if($opt5=="") $res5="";

               $opt6 = $row["option6"];
               $res6 = $row_votes["opt6"] ; 
               if($opt6=="") $res6="";


		        echo '<div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p> ' . $row["date"]. "</p> " . $row["question"]. '  </div>
        </div> <div class="col-sm-9">
          <div class="well"> ' . $opt1."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp". $res1. "<br>". $opt2."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp". $res2. "<br>". $opt3. "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$res3."<br>". $opt4. "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$res4."<br>". $opt5. "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$res5."<br>". $opt6. "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$res6.
          "<br>          </div>
        </div>
      </div>";

		    }
		} else {
		    echo "0 results";
		}

		mysqli_close($db);
		?>

    
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>LocalWire</p>
</footer>

</body>
</html>
