<?php

require 'database.php';
session_start();


if (!(isset($_SESSION['admin_user_id']))) {
    header("location:index.php");
} else {


?>

<html>
<head>
    <title>Suggestions</title>

</head>

<body>
<br>
<div style="text-align:center;">
    <div id="back">
        <button type="button" onclick="location.href='admin.php'" ;><--Back</button>
    </div>
    <h1>User Suggestions</h1>
    <hr>
    <center>
        <table style="text-align:center;" cellspacing="50" cellpadding="10">
            <tr style="outline: solid;">
                <th>User Name</th>
                <th>User Full Name</th>
                <th>Suggestion</th>
                <th>Date</th>
            </tr>
            <?php

            $limit = 25;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            };
            $row2Data=array();
            $total_pages =array();

            getUserSuggestion($page,$limit);

            foreach($row2Data as $res){

                echo '<tr style="outline: thin solid;">';
                echo "<td>" . $res['user_name'] . "</td>";
                echo "<td>" . $res['full_name'] . "</td>";
                echo "<td>" . $res['suggestion'] . "</td>";
                echo "<td>" . $res['date'] . "</td>";
                echo "</tr>";
            }
            }
            ?>

        </table>
    </center>

    <div style="text-align:center;">
        <?php
        $pagLink = "<ul>";
        for ($i = 1; $i <= $total_pages[0]; $i++) {
            $pagLink .= "<a href='user_suggestion.php?page=" . $i . "'>" . $i . "</a> ";
        };
        echo $pagLink . "</ul>";

        ?>
    </div>
</body>
</html>

