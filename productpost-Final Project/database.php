<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogdbms";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()) . "<br>";
}


?>





<?php

function getpost($page,$limit)
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blogdbms";


// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()) . "<br>";
    }


    $start_from = ($page - 1) * $limit;

    $sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL ORDER BY `post_id` DESC LIMIT $start_from, $limit";
    $result = mysqli_query($conn, $sql);


    global $row2Data;  $row2Data=array();
    global $total_pages; $total_pages= array();

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $post_id = $row['post_id'];
            $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
            $result2 = mysqli_query($conn, $sql2);


            while ($row2 = mysqli_fetch_assoc($result2)) {
                $rowData=array();

                $PostString = strip_tags($row['post']);
                if (strlen($PostString) > 100) {

                    // truncate string
                    $stringCut = substr($PostString, 0, 100);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $PostString = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                }

                $rowData['link']=$row2['link'] ;
                $rowData['title']=$row['title'] ;
                $rowData['time_date']=$row['time_date'] ;
                $rowData['user_name']=$row['user_name'];
                $rowData['post']=$PostString.'...' ;
                $rowData['post_id']=$row['post_id'];
                $row2Data[]=$rowData;


                ?>

                <?php


            }


        }

    }



    $sql = "SELECT COUNT(user_id) FROM `user_blog`";
    $rs_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];
    $total_pages[0] = ceil($total_records / $limit);
}

function getMostLikedpost($page,$limit)
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blogdbms";


// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()) . "<br>";
    }


    $start_from = ($page - 1) * $limit;

    $sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL ORDER BY `likes_count` DESC LIMIT $start_from, $limit";
    $result = mysqli_query($conn, $sql);


    global $row2Data;  $row2Data=array();
    global $total_pages; $total_pages= array();

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $post_id = $row['post_id'];
            $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
            $result2 = mysqli_query($conn, $sql2);


            while ($row2 = mysqli_fetch_assoc($result2)) {
                $rowData=array();

                $PostString = strip_tags($row['post']);
                if (strlen($PostString) > 100) {

                    // truncate string
                    $stringCut = substr($PostString, 0, 100);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $PostString = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                }

                $rowData['link']=$row2['link'] ;
                $rowData['title']=$row['title'] ;
                $rowData['time_date']=$row['time_date'] ;
                $rowData['user_name']=$row['user_name'];
                $rowData['post']=$PostString.'...' ;
                $rowData['post_id']=$row['post_id'];
                $row2Data[]=$rowData;


                ?>

                <?php


            }


        }

    }



    $sql = "SELECT COUNT(user_id) FROM `user_blog`";
    $rs_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];
    $total_pages[0] = ceil($total_records / $limit);
}

function getUserPost($page,$limit)
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blogdbms";


// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()) . "<br>";
    }


    $start_from = ($page - 1) * $limit;

    $sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL AND `user_id`='" . $_SESSION["user_id"] . "' ORDER BY `post_id` DESC LIMIT $start_from, $limit";
    $result = mysqli_query($conn, $sql);


    global $row2Data;  $row2Data=array();
    global $total_pages; $total_pages= array();


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $post_id = $row['post_id'];
            $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
            $result2 = mysqli_query($conn, $sql2);


            while ($row2 = mysqli_fetch_assoc($result2)) {
                $rowData=array();

                $PostString = strip_tags($row['post']);
                if (strlen($PostString) > 100) {

                    // truncate string
                    $stringCut = substr($PostString, 0, 100);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $PostString = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                }

                $rowData['link']=$row2['link'] ;
                $rowData['title']=$row['title'] ;
                $rowData['time_date']=$row['time_date'] ;
                $rowData['user_name']=$row['user_name'];
                $rowData['post']=$PostString.'...' ;
                $rowData['post_id']=$row['post_id'];
                $row2Data[]=$rowData;


                ?>

                <?php


            }


        }

    }



    $sql = "SELECT COUNT(user_id) FROM `user_blog` WHERE `user_id`='" . $_SESSION["user_id"] . "'";
    $rs_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];
    $total_pages[0] = ceil($total_records / $limit);
}

function getReportedpost($page,$limit)
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blogdbms";


// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()) . "<br>";
    }


    $start_from = ($page - 1) * $limit;

    $sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL AND `report_count`>9 ORDER BY `report_count` DESC LIMIT $start_from, $limit";
    $result = mysqli_query($conn, $sql);


    global $row2Data;  $row2Data=array();
    global $total_pages; $total_pages= array();

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $post_id = $row['post_id'];
            $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
            $result2 = mysqli_query($conn, $sql2);


            while ($row2 = mysqli_fetch_assoc($result2)) {
                $rowData=array();

                $PostString = strip_tags($row['post']);
                if (strlen($PostString) > 100) {

                    // truncate string
                    $stringCut = substr($PostString, 0, 100);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $PostString = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                }

                $rowData['link']=$row2['link'] ;
                $rowData['title']=$row['title'] ;
                $rowData['time_date']=$row['time_date'] ;
                $rowData['user_name']=$row['user_name'];
                $rowData['post']=$PostString.'...' ;
                $rowData['post_id']=$row['post_id'];
                $row2Data[]=$rowData;


                ?>

                <?php


            }


        }

    }



    $sql = "SELECT COUNT(user_id) FROM `user_blog` WHERE  `report_count`>9";
    $rs_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];
    $total_pages[0] = ceil($total_records / $limit);
}

function getUserSuggestion($page,$limit)
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blogdbms";

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()) . "<br>";
    }

    global $row2Data;  $row2Data=array();
    global $total_pages; $total_pages= array();


    $start_from = ($page - 1) * $limit;
    $sql = "SELECT * FROM `user_suggestion` Order by `date` DESC LIMIT $start_from, $limit";
    $rs_result = mysqli_query($conn, $sql);


    while ($res = mysqli_fetch_array($rs_result)) {

        $sql1 = "SELECT `user_name`, `full_name` FROM `user_table` WHERE `user_id`='" . $res["user_id"] . "'";
        $rs_result1 = mysqli_query($conn, $sql1);
        $res1 = mysqli_fetch_array($rs_result1);
        $rowData=array();


        $rowData['user_name']=$res1['user_name'] ;
        $rowData['full_name']=$res1['full_name'] ;
        $rowData['suggestion']=$res['suggestion'] ;
        $rowData['date']=$res['date'];
        $row2Data[]=$rowData;

    }




    $sql = "SELECT COUNT(user_id) FROM `user_suggestion`";
    $rs_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];
    $total_pages[0] = ceil($total_records / $limit);
}




?>