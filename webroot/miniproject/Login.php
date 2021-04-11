<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER");
$dbpwd = getenv("DATABASE_PASSWORD");
$dbname = getenv("DATABASE_NAME");
// Creates connection
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
// Checks connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["usname"];
    $password = $_POST["pass"];
    $select1 = "SELECT * from USERS WHERE email = '".$username."' and password ='".$password."'";
    if($conn->query($select1)==TRUE){
        if (isset($_POST["usname"], $_POST["pass"])) {
            session_start();
            $select1 = "DELETE FROM INPUT";
            $_SESSION['usname']=$username;
            $_SESSION['password']=$password;
            $result1=mysqli_query($conn,$select1);
            if(mysqli_num_rows($result1)>0){
                header("location: addEntry.php");
            }
            else{
                echo "Wrong username or password";
            }
        }
    }
    else{
        echo "Error: ". $sql. "<br>" . $conn->error;
    }
}
$conn->close();
?>