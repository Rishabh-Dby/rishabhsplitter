<!DOCTYPE html>
<?php
$server="localhost";
$username="root";
$password="";
$database="splitter";

$conn=mysqli_connect($server,$username,$password,$database);
session_start();
$uname=$_SESSION['username'];
$pid=$_SESSION['pid'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $expname=$_POST['expname'];
  $amount=$_POST['amount'];
  $mname=$_POST['mname'];
  $sql3="INSERT INTO `expense` (`expname`, `amount`,`mname`,`pid`) VALUES ('$expname', '$amount', '$mname', '$pid')";
  $sql4="UPDATE MEMBER SET OVERVIEW=OVERVIEW-('$amount'/(SELECT COUNT(*) FROM MEMBER WHERE PID='$pid')) WHERE MNAME!='$mname'";
  $sql5="UPDATE MEMBER SET OVERVIEW=OVERVIEW+('$amount'-('$amount'/(SELECT COUNT(*) FROM MEMBER WHERE PID='$pid'))) WHERE MNAME='$mname'";
  $result=mysqli_query($conn,$sql3);
  $result4=mysqli_query($conn,$sql4);
  $result5=mysqli_query($conn,$sql5);
  // if($result4){
  //   echo "success4";
  // }
  // if($result4){
  //   echo "success5";
  // }
  if($result){
      echo "succesfully entered";
  }
  else{
      echo "error";
  }
}
if($conn){
}
else{
    die("Error" . mysqli_connect_error());
}

$sql="SELECT * FROM EXPENSE WHERE pid='$pid'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$sql2="SELECT * FROM MEMBER WHERE pid='$pid'";
$result2=mysqli_query($conn,$sql2);
$num2=mysqli_num_rows($result2);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="project.css">
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
        <div class="header"><button type="button" class="btn btn-outline-danger btn-lg mainbutton" >Expenses</button></div><div class="header"><button type="button" class="btn btn-outline-danger btn-lg mainbutton"><a href="overview.php" id="overbtn">Overview</a></button></div>
      </div>

      <!-- expenses -->


      <div id="expenses">
        <?php
        for($x=0;$x<$num;$x++){
          $row=mysqli_fetch_assoc($result);
          echo '<div class="row">
          <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
              <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
            </svg>
          </div>
          <div class="col">
            ' . $row['expname'] . '
          </div>
          <div class="col">
          ' . $row['mname'] . '
          </div>
          <div class="col">
          ' . $row['amount'] . '
          </div>
        </div>';
        }
        ?>
      </div>
      <div id="newexpense">
        <h2>Add new expense</h2>
        <form action="http://localhost/splitter/server/project.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Expense name</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="expname">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Amount</span>
            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="amount">
            <select class="form-select" aria-label="Default select example" name="mname">
              <?php
                $row2=mysqli_fetch_assoc($result2);
                echo '<option selected value=' . $row2['mname'] . '>' . $row2['mname'] . '</option>';
                for($y=1;$y<$num2;$y++){
                  $row2=mysqli_fetch_assoc($result2);
                  echo '<option value=' . $row2['mname'] . '>' . $row2['mname'] . '</option>';
                }
                ?>
            </select>
          </div>
          
          <input class="btn btn-primary" id="add" type="submit" value="Submit">
        </form> 
      </div>
    
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>