<?php
   include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Admin LocalWire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
  
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
</style>
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

<div class="container">
  <h2>All registered admins</h2>        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php

    $sql = "SELECT * FROM admin";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

          $name = $row['name'];
          $mobile = $row['mobile'];
          $password = $row['password'];
          echo "".$name . " " . $mobile . " " . $password. " ";


?>
        
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td><input type="submit" value="Submit"></td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
        <td><input type="submit" value="Submit"></td>
      </tr>
    </tbody>
  </table>
</div>

<?php }


        }else{
        echo "0 results";

      }


          ?>
<footer class="container-fluid text-center">
  <p>LocalWire</p>
</footer>
</body>
</html>