<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */welcome
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
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
      <a class="navbar-brand" href="index.php">LocalWire</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
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

<h2>Post Question Here</h2>


<div class="container">
  <form action="post.php" method="post" >
  <div class="row">
      <div class="col-25">
        <label for="op1">Select Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="bday" name="day" placeholder="Enter the first option">
      </div>
    </div>
<div class="row">
      <div class="col-25">
        <label for="Ask Question">Ask Question</label>
      </div>
      <div class="col-75">
        <input type="text" id="Ask Question" name="question" placeholder="Ask a Question">
      </div>
    </div>
  
    <div class="row">
      <div class="col-25">
        <label for="option1">Option 1</label>
      </div>
      <div class="col-75">
        <input type="text" id="option1" name="opt1" placeholder="Enter the first option">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="option2">Option 2</label>
      </div>
      <div class="col-75">
        <input type="text" id="option2" name="opt2" placeholder="Enter the second option">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="option3">Option 3</label>
      </div>
      <div class="col-75">
        <input type="text" id="option3" name="opt3" placeholder="Enter the third option">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="option4">Option 4</label>
      </div>
      <div class="col-75">
        <input type="text" id="option4" name="opt4" placeholder="Enter the fourth option">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="option5">Option 5</label>
      </div>
      <div class="col-75">
        <input type="text" id="option5" name="opt5" placeholder="Enter the fifth option">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="option5">Option 6</label>
      </div>
      <div class="col-75">
        <input type="text" id="option5" name="opt6" placeholder="Enter the fifth option">
      </div>
    </div>
    
    
    
    <div class="row">
      <input type="submit" value="Post">
    </div>
  </form>
</div>

</body>
</html>
