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
$sql1 = "CREATE TABLE USERS(
email VARCHAR(255),
password VARCHAR(255)
)";
$sql2 = "INSERT INTO USERS (email, pass) VALUES ($emailaddress,$password)";
if($conn->query($sql1)==TRUE){
    if (isset($_POST["usname"], $_POST["pass"])) {
        session_start();
        $username = $_POST["usname"];
        $password = $_POST["pass"];
        $result = mysql_query("SELECT email, pass FROM $sql2 WHERE email = '.$username.' AND pass ='.$password.'");
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
$conn->close();
?>