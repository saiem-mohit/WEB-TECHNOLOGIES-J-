<!DOCTYPE html>
<?php
require 'database.php';
session_start();


if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
}
else {

?>

<!DOCTYPE html>
<html>
<head>
    <title>EditProfile</title>
</head>
<body>

<fieldset>
    <legend><h2>Edit Profile:</h2></legend>
    <div style="text-align:center;">
        <div id="log"><h2>Edit Profile:</h2></div>
        <br/>
        <div>
            <div id="back" style="text-align:right;">
                <button type="button"  id="back" onclick="location.href='profile.php';">
                    Back
                </button>
            </div>
        </div>
        <form action="editProfileSave.php" enctype="multipart/form-data"
              onsubmit="return validateForm()" method="post"
              name="registration_form">

            <div id="fname">
                <label for="usr">Fullname: </label>

                <input type="text" id="usr" name="fullname"
                       value="<?php echo $_SESSION["full_name"]; ?>">
                <span id="usrErr"> </span>
            </div><br><br>


            <?php
            if ($_SESSION["gender"] == 'male') {
                ?>
                <div id="gender">
                    <label for="gender"> Gender: </label>

                    <input type="radio" name="gender" value="female" id="female">Female
                    <input type="radio" name="gender" value="male" id="male" checked>Male
                    <span id="blog_idErr"> </span>
                </div>
                <?php

            } else {
                ?>
                <div id="gender">
                    <label for="gender"> Gender: </label>

                    <input type="radio" name="gender" value="female" id="female" checked>Female
                    <input type="radio" name="gender" value="male" id="male">Male
                    <span id="blog_idErr"> </span>
                </div>
                <?php
            }
            ?><br><br>


            <div id="dob">
                <label for="dob"> Date Of Birth: </label>
                <input type="date" name="bday" id="usr" value="<?php echo $_SESSION["dob"]; ?>">
                <span id="blog_idErr"> </span>
            </div><br><br>


            <div id="phone">
                <label for="email"> Phone: </label>
                <input type="text" id="usr" name="phone"
                       value="<?php echo $_SESSION["phone_number"]; ?>">
                <span id="blog_idErr"> </span>
            </div><br><br>

            <div id="pass">
                <label for="pwd">Password: </label>
                <input type="password" id="pwd1" name="pass"
                       value="<?php echo $_SESSION["password"]; ?>" onchange="passClear()">
                <span id="blog_idErr"> </span>
            </div><br><br>


            <div id="repass">
                <label for="pwd">Confirm Password: </label>
                <input type="password" id="pwd2" name="repass" value="<?php echo $_SESSION["password"]; ?>" >
                <span id="blog_idErr"> </span>
            </div><br><br>


            <div id="pic">
                <label for="file">Profile Picture: </label>
                <input type="file" id="pwd" name="propic">
            </div><br><br>

            <div id="occupation">
                <label for="file">Occupation: </label>
                <input type="text" id="pwd" name="occupation" value="<?php echo $_SESSION["occupation"]; ?>">
                <span id="blog_idErr"> </span>
            </div><br><br>


            <div id="Submit">
                <label for="file"></label>
                <input type="submit" id="pwd" value="Submit">
            </div>

        </form>

    </div>


    <script>


        function validateForm() {



            var fullName = document.getElementById("fname").getElementsByTagName("input")[0].value;

            if (fullName == "") {
                //alert("Name must be filled out");
                document.getElementById("fname").getElementsByTagName("span")[0].innerHTML="Name must be filled out";
                document.getElementById("fname").getElementsByTagName("span")[0].style.color="red";
                return false;

            }


            var phoneNumber = document.getElementById("phone").getElementsByTagName("input")[0].value;
            if (phoneNumber == "" || phoneNumber.length != 11) {
                document.getElementById("phone").getElementsByTagName("span")[0].innerHTML="Phone Error";
                document.getElementById("phone").getElementsByTagName("span")[0].style.color="red";
                //alert("Phone Error");
                return false;
            }


            var Mgender = document.getElementById("gender").getElementsByTagName("input")[0].checked;
            var Fgender = document.getElementById("gender").getElementsByTagName("input")[1].checked;
            if (!Mgender && !Fgender) {
                document.getElementById("gender").getElementsByTagName("span")[0].innerHTML="Choose gender";
                document.getElementById("gender").getElementsByTagName("span")[0].style.color="red";
                //alert("Choose gender");
                return false;
            }


            var birthDay = document.getElementById("dob").getElementsByTagName("input")[0].value;
            if (!birthDay) {
                document.getElementById("dob").getElementsByTagName("span")[0].innerHTML="Choose Birthday";
                document.getElementById("dob").getElementsByTagName("span")[0].style.color="red";
                //alert("Choose Birthday");
                return false;
            }



            var passWord = document.getElementById("pwd1").value;
            var repassWord = document.getElementById("pwd2").value;

            if (passWord.length<8) {
                document.getElementById("pass").getElementsByTagName("span")[0].innerHTML="Password must be at least 8 character";
                document.getElementById("repass").getElementsByTagName("span")[0].innerHTML="Password must be at least 8 character";
                document.getElementById("pass").getElementsByTagName("span")[0].style.color="red";
                document.getElementById("repass").getElementsByTagName("span")[0].style.color="red";
                //alert("Password must be at least 8 character");
                return false;
            }

            if (passWord == "") {
                document.getElementById("pass").getElementsByTagName("span")[0].innerHTML="Enter a password";
                document.getElementById("pass").getElementsByTagName("span")[0].style.color="red";
                //alert("Enter a password");
                return false;
            }
            if (repassWord == "") {
                document.getElementById("repass").getElementsByTagName("span")[0].innerHTML="Renter password";
                document.getElementById("repass").getElementsByTagName("span")[0].style.color="red";
                //alert("Renter password");
                return false;
            }

            if (passWord != repassWord) {
                alert("Password Doesn't match");
                return false;
            }



            var occupation = document.getElementById("occupation").getElementsByTagName("input")[0].value;
            if (occupation == "") {
                document.getElementById("occupation").getElementsByTagName("span")[0].innerHTML="please write your occupation";
                document.getElementById("occupation").getElementsByTagName("span")[0].style.color="red";
                //alert("please write your occupation");
                return false;
            }

        }
    </script>

    <script>
        function passClear() {
            document.getElementById("repass").getElementsByTagName("input")[0].value = "";
        }
    </script>
</fieldset>
</body>
</html>


<?php
}

?>