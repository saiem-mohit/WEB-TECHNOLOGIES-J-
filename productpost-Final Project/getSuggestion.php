<?php
//DB +JSON
$mysqli = new mysqli('localhost','root','','blogdbms');
$result = $mysqli->query("SELECT * FROM user_blog");
$q = $_REQUEST['q'];
$rows = [];
$suggestion = 0;

//Get Suggestion
if($q !== ""){
    $q = strtolower($q);
    $len = strlen($q);

    while ($person= mysqli_fetch_assoc($result)){
        if(stristr($q , substr($person['title'],0, $len))){
            $rows[] = $person;
            $suggestion = 1;
        }
        elseif(stristr($q , substr($person['user_name'],0, $len))){
            $rows[] = $person;
            $suggestion = 1;
        }
    }
}

if($suggestion)
    echo json_encode($rows);
else
    echo json_encode("NO");




