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
        $tabletime=date("h:i");
        $date=date('jS F Y');
        $title = $_POST['title'];
        $body = $_POST['body'];
        $sql = "INSERT INTO INPUT(time,date,title,body) VALUES('$tabletime','$date','$title','$body')";
        if($conn->query($sql)==TRUE){
            header('location:viewBlog.php');
        }
        else{
            echo "Error: ". $sql. "<br>" . $conn->error;
        }    
    }    
?>