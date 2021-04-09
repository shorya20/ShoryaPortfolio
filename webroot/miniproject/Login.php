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
$emailaddress = "shoryaoct20@gmail.com";
$password = "Shorya!";
$sql1 = "INSERT INTO USERS (email, password) VALUES ($emailaddress,$password)";
if($conn->query($sql1)==TRUE){
    session_start();
    if ($_SERVER["REQUEST METHOD "]=="POST") {
        $username = $_POST["usname"];
        $password = $_POST["pass"];
        $sql2 = "SELECT * FROM email WHERE username= '$username' and password='$password'";
        $result = mysql_query($sql2);
        $count = mysql_num_rows($result);
        echo $count;
        if($count==1){
            session_register("usname");
            session_register("pass");
            header("Location: addPost.php");
        }
        else{
            echo "Wrong username or password";
        }
    }
}
else{
    echo "Error: ". $sql. "<br>" . $conn->error;
}
$conn->close();
?>