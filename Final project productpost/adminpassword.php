<?php
require 'database.php';
session_start();


if (!(isset($_SESSION['admin_user_id']))) {
    header("location:index.php");
} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Admin Password</title>
    </head>
    <body>

    <fieldset>
        <legend><h2>Change Password:</h2></legend>
        <div style="text-align:center;">

            <div style="text-align:right;">
                <div id="back" style="width:100%">
                    <button type="button" onclick="location.href='admin.php'" ;><--Back</button>
                </div>
            </div>

            <div id="log"><h2>Change Password:</h2></div>
            <br/>
            <form action="adminpasswordsave.php" onsubmit="return validateForm()" method="post">


                <div id="oldpass1">
                    <label for="pwd">Old Password: </label>
                    <input type="password" id="oldpass" name="opass">
                    <span id="oldpassErr"> </span>
                </div>

                <br/>

                <div id="newpass1">
                    <label for="pwd">New Password: </label>
                    <input type="password" id="newpass" name="npass">
                    <span id="newpassErr"> </span>
                </div>

                <br/>

                <div id="repass1">
                    <label for="pwd">Retype Password: </label>
                    <input type="password" id="repass" name="rpass">
                    <span id="repassErr"> </span>
                </div>
                <br/>


                <br/>
                <div id="submit"><input type="submit" value="submit"></div>
                <br/>

            </form>


        </div>
    </fieldset>


    <script>
        function validateForm() {


            var oldpassWord = document.getElementById("oldpass1").getElementsByTagName("input")[0].value;
            if (oldpassWord == "") {
                document.getElementById('oldpassErr').innerHTML = "Enter old password";
                document.getElementById('oldpassErr').style.color = "red";
                //alert("Enter old password");
                return false;
            }


            var newpassWord = document.getElementById("newpass1").getElementsByTagName("input")[0].value;
            if (newpassWord == "") {
                document.getElementById('newpassErr').innerHTML = "Enter new password";
                document.getElementById('newpassErr').style.color = "red";
                //alert("Enter new password");
                return false;
            }


            var RepassWord = document.getElementById("repass1").getElementsByTagName("input")[0].value;
            if (RepassWord == "") {
                document.getElementById('repassErr').innerHTML = "Enter the password again";
                document.getElementById('repassErr').style.color = "red";
                //alert("Enter the password again");
                return false;
            }

            if (newpassWord.valueOf() !== RepassWord.valueOf()) {
                alert("Password doesn't match");
                return false;
            }

//            if (newpassWord === oldpassWord) {
//                alert("old Password can't be same as new password);
//                return false;
//            }
        }

    </script>

    </body>
    </html>

    <?php
}

?>
