<!DOCTYPE html>
<?php
$server="localhost";
$username="root";
$password="";
$database="splitter";

$conn=mysqli_connect($server,$username,$password,$database);
session_start();
$pid=$_SESSION['pid'];
$sql="SELECT * FROM MEMBER WHERE pid='$pid'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $newmname=$_POST['newmname'];
  $sql2="INSERT INTO `member` (`mname`, `pid`) VALUES ('$newmname', '$pid')";
  $result2=mysqli_query($conn,$sql2);
  if($result){
      echo "succesfully entered";
  }
  else{
      echo "error";
  }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="overview.css">
    <title>ProjectName</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg " id="topnav">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Splitter</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="profile.html">Home</a></li>
                  <li><a class="dropdown-item" href="http://localhost/splitter/server/logout.php">Logout</a></li>
                  <li><a class="dropdown-item" href="http://localhost/splitter/server/feedback.php">Feedback</a></li>
                  <li><a class="dropdown-item" href="http://localhost/splitter/server/grievances.php">Grievances</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <span class="navbar-text">
          <?php
          echo '<span class="navbar-text">
          Welcome ' . $_SESSION['username'] . ' 
        </span>';
          ?>
          </span>
        </div>
    </nav>
      <div id="mainheader">
        <div class="header"><button type="button" class="btn btn-outline-danger btn-lg mainbutton" ><a id="expbtn" href="project.php">Expenses</a></button></div><div class="header"><button type="button" class="btn btn-outline-danger btn-lg mainbutton">Overview</button></div>
      </div>

      <!-- overview -->

    <div id="overview">
      <?php
      for($x=0;$x<$num;$x++){
        $row=mysqli_fetch_assoc($result);
        echo '<div class="row">
        <div class="col">
          ' .$row['mname'] . '
        </div>
        <div class="col">
          ' .$row['overview'] . '
        </div>
      </div>';
      }
      ?>
    </div>  
    <div id="newmember">
        <h2>Add new member</h2>
        <form action="http://localhost/splitter/server/overview.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Member name</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="newmname">
          </div>
          
          <input class="btn btn-primary" id="add" type="submit" value="Submit">
        </form> 
      </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>