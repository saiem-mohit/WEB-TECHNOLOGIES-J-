<?php
require 'database.php';
session_start();


?>
<!doctype html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
<header>

    <div style="text-align:center;">
        <form>
            <?php

                echo'
                 <div>
                        <button type="submit" formaction="index.php">Home</button>
                        <button type="submit" formaction="index.php">Most Recent</button>
                        <button type="submit" formaction="mostLiked.php">Most liked</button>
                    ';
            if ((isset($_SESSION['user_name']))) {
                echo '
                        <button type="submit" formaction="blog.php">Add new post</button>
                        <button type="submit" formaction="userPosts.php">Posts OF Mine</button>
                        <button type="submit" formaction="logout.php">Logout</button>
                    ';
            } else
                echo    '<button type="submit" formaction="login.php">Login</button>';

            echo'</div>';

            ?>

            <br><br>

                <input id="in" type="text" placeholder="Search"
                       onkeyup="showSuggestion(this.value)"/>
            </form>



        <pre>
        <p><span id="output" style="font-weight: bold"></span></p>
        </pre>


        <div  id="posts">
            <div  id="res">

            </div>
        </div>
</header>
<main>
    <script>
        function showSuggestion(str) {
            document.getElementById('res').innerHTML = "";
            if (str.length > 0) {
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "getSuggestion.php?q=" + str, true);
                xhr.send();
                xhr.onload = function () {
                    if (this.status === 200) {
                        let ob = JSON.parse(this.responseText);
                        if (ob === "NO") {
                            document.getElementById('output').innerHTML = "No suggestions";
                        }
                        else {
                            document.getElementById('output').innerHTML = "";

                            for (let i = 0; i < ob.length; i++) {
                                document.getElementById('res').innerHTML +=
                                    '<fieldset>'+
                                    '<div>' +
                                    '<div>' +
                                    '<div>' +
//                                    '<img src="'+ob[i].link+'">' +
                                    '<h3 id="title">' + ob[i].title + '</h3>' +
                                    '<small>Created on ' +
                                    '<div id="created">' + ob[i].time_date + '</div> ' + 'by ' +
                                    '<div id="author">' + ob[i].user_name + '</div>' +
                                    '</small>' +
                                    '<div id="body">' + ob[i].post + '</div>' +
                                    '<div id="SeeMore"><a href="readMore.php?id=' + ob[i].post_id + '">' + "Read More" + '</a></div>' + '</div>' + '</div>' + '</div>'+
                                    '</fieldset><hr>';
                            }
                        }
                    }
                }
            }
            else {
                document.getElementById('res').innerHTML = "";
            }
        }
    </script>
</main>

</body>
</html>
