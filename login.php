<!DOCTYPE html>
<?php
$server="localhost";
$username="root";
$password="";
$database="splitter";

$conn=mysqli_connect($server,$username,$password,$database);
if($conn){
}
else{
    die("Error" . mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usrname=$_POST["username"];
    $pwd=$_POST["pwd"];
    $sql="SELECT * FROM user WHERE USERNAME='$usrname' AND password='$pwd'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num){
        $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$usrname;
        header('location:profile.php');
    }
    else{
        $login=false;
        echo "INVALID CREDENTIAL";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Licorice&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Splitter</h1>
    <form id="loginform" action="http://localhost/splitter/server/login.php" method="post">
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Username</span>
            <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="rishabh_dubey@gmail.com" name="username" >
        </div>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="pwd">
        </div>
        <button  class="btn btn-light btn-lg">Login</button> 
    </form>
    <p>Don't have an account please register? <a href="http://localhost/splitter/server/signup.php"> Click here </a></p>
</body>
</html>

<!-- rishabh@gmail.com
Rish077@ -->