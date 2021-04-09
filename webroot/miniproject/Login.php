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
            $result = mysql_query("SELECT email, password FROM $sql WHERE email = '".$username."' and password ='".$password."'");
            $count = mysql_num_rows($result);
            if($count>0){
                $_SESSION["usname"]=$username;
                $_SESSION["password"]=$password;
                $_SESSION["status"]=true;
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