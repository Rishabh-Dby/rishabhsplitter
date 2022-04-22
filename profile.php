<!DOCTYPE html>
<?php
$server="localhost";
$username="root";
$password="";
$database="splitter";

$conn=mysqli_connect($server,$username,$password,$database);
session_start();
$uname=$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['proname'])){
        $pname=$_POST['proname'];
        $sql="INSERT INTO `project` (`pname`, `uname`) VALUES ('$pname', '$uname')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "succesfully entered";
        }
        else{
            echo "error";
        }
    }
     else if(isset($_POST["proj"])){
         
         $_SESSION['pid']=$_POST["proj"];
         header('location:project.php');
     }
}
if($conn){
}
else{
    die("Error" . mysqli_connect_error());
}

// $sql="SELECT * FROM PROJECT WHERE UNAME='$uname'";
$sql="CALL getprojects('$uname');";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <title>Home</title>
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
          <?php
          echo '<span class="navbar-text">
          Welcome ' . $_SESSION['username'] . ' 
        </span>';
          ?>
        </div>
      </nav>
     <h2>Your Projects</h2>
    </div>
    <div id="maincontainer">
      <?php
      for($x=0;$x<$num;$x++){
        $row=mysqli_fetch_assoc($result);
        $pid=$row['pid'];
        echo ' <div class="pname" >
          <form class="container btn-group mb-5" id="container-button" method="post" action="http://localhost/splitter/server/profile.php"  >
            <button class="btn btn-secondary btn-lg" type="submit" id="select-button-display" name="proj" value=' .$pid . '>
              ' .$row['pname'] . '
            </button>
          </form>
        </div>';
      }
      ?>
      <form action="http://localhost/splitter/server/profile.php" class="container fixed-bottom" id="create-new" method="post">
        <div class="input-group mb-3 ">
            <span class="input-group-text" id="inputGroup-sizing-default">Create new</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Project name" name="proname">
            <button id="createproject" type="submit" class="btn btn-lg" style="margin-left: 9px;">+</button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>