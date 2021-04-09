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
    $sql = "INSERT INTO USERS(email,password) VALUES ('shoryaoct20@gmail.com','Shorya!')";
    if($conn->query($sql)==TRUE){
        if (isset($_POST["usname"], $_POST["pass"])) {
            session_start();
            $username = $_POST["usname"];
            $password = $_POST["pass"];
            $select1 = "SELECT * from USERS WHERE email = '".$username."' and password ='".$password."'";
            $result1=mysqli_query($conn,$select1);
            if(mysqli_num_rows($result1)>0){
                echo "<h6> Registration successful";
                $_SESSION['usname']=$username;
                $_SESSION['password']=$password;
                header("location: addPost.php");
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