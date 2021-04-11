<!DOCTYPE html>
<html>
    <title>Blog</title>
    <head>
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="blog.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="portfolio homepage.html" class="logo"> <img src="Screenshot 2021-03-17 131113.png" alt="logo"></a>
                <h1>Blog homepage of Shorya Sinha</h1>
            </nav>
            <figure><img src="index.png" alt="blogimg"></figure>
            <div class="header">
                <h1>Welcome to my Blog page</h1>
                <p>Feel free to post blog enteries down below</p>
            </div>
        </header>
        <div class="left">
            <aside>
                <div class="homepage">
                    <h1>Homepage Link</h1>
                    <button class="portfolio"><a href="portfolio homepage.html">Click here to access my portfolio homepage!</a>   
                </div>            
            </aside> 
        </div>
        <div class="right">
            <aside class="redirect">
                <div class="loginpage">
                    <h1>Redirect to the Login of the Blog page</h1>
                    <button class="login"><a href="Login.html">Click here to redirect to the login page</a>
                </div>
            </aside>
        </div>
        <div class="view">
                <p>
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
                        $sql = "SELECT time,date,title,body from INPUT";
                        $result = $conn->query($sql);
                        if($result->num_rows>0){
                            session_start();
                            echo "<table>";
                            $timearray=array();
                            $datearray=array();
                            $titlearray=array();
                            $bodyarray=array();
                            while($row = $result->fetch_assoc()){
                                $timearray[]=$row["time"];
                                $datearray[]=$row["date"];
                                $titlearray[]=$row["title"];
                                $bodyarray[]=$row["body"];    
                            }
                            $length=count($titlearray);
                            krsort($timearray);
                            krsort($datearray);
                            krsort($titlearray);
                            krsort($bodyarray);
                            for($i=0;$i<$length;$i++){
                                echo "<tr><td class='entry'><small>".$datearray[$i].",".$timearray[$i]."UTC</small></br><h1>".$titlearray[$i]."</h1></br><p>".$bodyarray[$i]."</p></td></tr>";
                            }
                            echo "</table>";    
                        } 
                    ?>
                </p>
        </div>
    </body>
</html>