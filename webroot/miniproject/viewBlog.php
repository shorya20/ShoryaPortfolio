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
        <div class="view">
            <article>
                <section>
                <p>
                <?php
                        session_start();
                        echo("{$_SESSION['title']}");
                    ?>
                </p>
                </section>
            </article>
        </div>
        <div class="right">
            <aside class="redirect">
                <div class="loginpage">
                    <h1>Redirect to the Login of the Blog page</h1>
                    <button class="login"><a href="Login.html">Click here to redirect to the login page</a>
                </div>
            </aside>
        </div>
    </body>
</html>