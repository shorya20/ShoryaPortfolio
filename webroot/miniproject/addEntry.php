<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="blog.css">
    </head>
    <body>
        <script>
            function preview(){
                var title = document.getElementById("title").value;
                var body = document.getElementById("body").value;
                window.alert("Preview reads:\nTitle: "+title+"\nBody: "+body);
            }
            function stopE(e){
                e.preventDefault();
            }
            function click1(){
                var title=document.getElementById("title").value;
                var body = document.getElementById("body").value;
                if(title!=""){
                    var value=window.confirm("You are about to clear your message. Click OK to confirm");
                    if(value){
                    document.getElementById("myform").reset();
                    }
                }
                else if(body!=""){ 
                    var value=window.confirm("You are about to clear your message. Click OK to confirm");
                    if(value){
                        document.getElementById("myform").reset();
                    }
                }
            }
            function checkempty(){
                var title=document.getElementById("title").value;
                var body = document.getElementById("body").value;
                if(title=="" & body!=""){
                    document.getElementById("title").style.border="2pt solid red";
                    document.getElementById("body").style.border="2pt solid green";
                    window.alert("Please enter a title");
                    document.body.addEventListener("click",stopE);
                    return false;
                }
                else if(body=="" && title!=""){
                    window.alert("Please enter a body");
                    document.getElementById("title").style.border="2pt solid green";
                    document.getElementById("body").style.border="2pt solid red";
                    document.body.addEventListener("click",stopE);
                    return false;
                }
                else if(title=="" & body==""){
                    window.alert("Please enter a title and a body");
                    document.getElementById('title').style.border="2pt solid red";
                    document.getElementById('body').style.border="2pt solid red";
                    document.body.addEventListener("click",stopE);
                    return false;
                }
                else{
                    document.body.removeEventListener("click",stopE);
                    return true;
                }
            }
        </script>
        <div class="middle">
            <article>
                <section class="blog_box_outside">
                    <form method="POST" action="addPost.php" id="myform">
                        <fieldset class="blog_box">
                            <h1>Add Blog</h1>
                            <section>
                                <div class="title">
                                    <p>
                                        <label for="Title"></label>
                                            <input type="text" name="title" placeholder="Title" id="title">
                                    </p>
                                </div>
                                <div class="body">
                                    <p>
                                        <label for="Body"></label>
                                        <textarea id="body" placeholder="Enter your text here" name="body"></textarea>
                                    </p>
                                </div>
                                <div class="preview">
                                    <button class="input" type="button" onclick="preview()">Preview your post</button>
                                </div>   
                                <div class="submit">
                                    <button class="input" type="submit" onclick="return checkempty()">Submit</button>
                                </div>
                                <div class="reset">
                                    <button class="input" type="button" onclick="click1()">Reset</button>
                                </div>
                            </section>
                        </fieldset>
                    </form>
                </section>
            </article>
        </div>
    </body>
</html>