<?php
session_start();


if ((isset($_SESSION['user_id']))) {

    header("location:profile.php");
} else if ((isset($_SESSION['admin_user_id']))) {
    header("location:admin.php");
} else if (!(isset($_SESSION['user_id'])) || !(isset($_SESSION['admin_user_id']))) {
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Signup</title>
    </head>
    <body>

    <fieldset>
        <legend><h2>Registration:</h2></legend>
        <div style="text-align:center;">
            <div id="log"><h2>Register:</h2></div>
            <br>

            <div style="text-align:right;">
                <div id="back">
                    <button type="button" id="back" onclick="location.href='index.php';">
                        <--Back
                    </button>
                </div>
            </div><br>

            <form action="registration.php" enctype="multipart/form-data"
                  onsubmit="return validateForm()" onclick="clearError()" method="post"
                  name="registration_form">


                <div id="fname">
                    <label for="usr">Fullname: </label>


                    <input type="text" id="usr" name="fullname"
                           onchange="generateUsername(this.value)">
                    <span id="blog_idErr"> </span>
                </div><br>

                <div id="uname">
                    <label for="usr">Username: </label>


                    <input type="text" id="usr" name="username" value="" readonly>
                    <span id="blog_idErr"> </span>
                </div><br>


                <div id="email">
                    <label for="email"> Email: </label>


                    <input type="email" id="emailvarify" name="email" onblur="checkInput()">
                    <span id="blog_idErr"> </span>
                </div><br>

                <div id="gender">
                    <label for="gender"> Gender: </label>

                    <input type="radio" name="gender" value="female" id="female">Female
                    <input type="radio" name="gender" value="male" id="male">Male
                    <span id="blog_idErr"> </span>
                </div><br>


                <div id="dob">
                    <label for="dob"> Date Of Birth: </label>

                    <input type="date" name="bday" id="usr">
                    <span id="blog_idErr"> </span>
                </div><br>


                <div id="phone">
                    <label for="email"> Phone: </label>
                    <input type="text" id="usr" name="phone">
                    <span id="blog_idErr"> </span>
                </div><br>

                <div id="pass">
                    <label for="pwd">Password: </label>
                    <input type="password" id="pwd" name="pass">
                    <span id="blog_idErr"> </span>
                </div><br>


                <div id="repass">
                    <label for="pwd">Confirm Password: </label>
                    <input type="password" id="pwd" name="repass">
                    <span id="blog_idErr"> </span>
                </div><br>


                <div id="pic">
                    <label for="file">Profile Picture: </label>
                    <input type="file" id="pwd" name="propic">
                    <span id="blog_idErr"> </span>
                </div><br>

                <div id="occupation">
                    <label for="file">Occupation: </label>
                    <input type="text" id="pwd" name="occupation">
                    <span id="blog_idErr"> </span>
                </div><br>


                <div id="Submit">
                    <label for="file"></label>
                    <input type="submit" id="pwd" value="Submit">
                </div><br>


                <div id="Reset">
                    <label for="file"></label>
                    <button type="reset" id="pwd">Reset</button>
                </div><br>

            </form>

        </div>
    </fieldset>

    <script>


        function validateForm() {

            var fullName = document.getElementById("fname").getElementsByTagName("input")[0].value;

            if (fullName == "") {
                document.getElementById("fname").getElementsByTagName("span")[0].innerHTML="Name must be filled out";
                document.getElementById("fname").getElementsByTagName("span")[0].style.color="red";
                //alert("Name must be filled out");
                return false;
            }

            var userName = document.getElementById("uname").getElementsByTagName("input")[0].value;
            if (userName == "") {
                document.getElementById("uname").getElementsByTagName("span")[0].innerHTML="uname Error";
                document.getElementById("uname").getElementsByTagName("span")[0].style.color="red";
                //alert("UserName must be filled out");
                return false;
            }

            var phoneNumber = document.getElementById("phone").getElementsByTagName("input")[0].value;
            if (phoneNumber == "" || phoneNumber.length != 11) {
                document.getElementById("phone").getElementsByTagName("span")[0].innerHTML="Phone Error";
                document.getElementById("phone").getElementsByTagName("span")[0].style.color="red";
                //alert("Phone Error");
                return false;
            }

            var Email = document.getElementById("email").getElementsByTagName("input")[0].value;
            if (!Email) {
                document.getElementById("email").getElementsByTagName("span")[0].innerHTML="Enter Email";
                document.getElementById("email").getElementsByTagName("span")[0].style.color="red";
                //alert("Enter Email");
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


            var passWord = document.getElementById("pass").getElementsByTagName("input")[0].value;
            var repassWord = document.getElementById("repass").getElementsByTagName("input")[0].value;
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
            if (passWord.length<8) {
                document.getElementById("pass").getElementsByTagName("span")[0].innerHTML="Password must be at least 8 character";
                document.getElementById("repass").getElementsByTagName("span")[0].innerHTML="Password must be at least 8 character";
                document.getElementById("pass").getElementsByTagName("span")[0].style.color="red";
                document.getElementById("repass").getElementsByTagName("span")[0].style.color="red";
                //alert("Password must be at least 8 character");
                return false;
            }


            var profilePicture = document.getElementById("pic").getElementsByTagName("input")[0].value;
            if (profilePicture == "") {
                document.getElementById("pic").getElementsByTagName("span")[0].innerHTML="Upload a profile picture";
                document.getElementById("pic").getElementsByTagName("span")[0].style.color="red";
                //alert("Upload a profile picture");
                return false;
            }

            var occupation = document.getElementById("occupation").getElementsByTagName("input")[0].value;
            if (occupation == "") {
                document.getElementById("occupation").getElementsByTagName("span")[0].innerHTML="please write your occupation";
                document.getElementById("occupation").getElementsByTagName("span")[0].style.color="red";
                //alert("please write your occupation");
                return false;
            }

            var science = document.getElementById("check1").getElementsByTagName("input")[0].checked;
            var cs = document.getElementById("check1").getElementsByTagName("input")[1].checked;
            var eee = document.getElementById("check1").getElementsByTagName("input")[2].checked;
            var other = document.getElementById("check1").getElementsByTagName("input")[3].checked;

            if (!science && !cs && !eee && !other) {
                document.getElementById("subs").getElementsByTagName("span")[0].innerHTML="Yoy have to subscribe at least in one";
                document.getElementById("subs").getElementsByTagName("span")[0].style.color="red";
                //alert("Yoy have to subscribe at least in one");
                return false;
            }


        }

    </script>


    <script>
        function checkInput() {
            let email = document.getElementById("emailvarify").value;
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "mailuniqueCheck.php?e=" + email, true);
            xhr.send();

            xhr.onload = function () {
                if (this.status === 200) {
                    if (this.responseText == 0) {
                        document.getElementById('emailvarify').value = 'Email already exists';

                    }
                    else if (this.responseText == 1) {
                        document.getElementById('emailvarify').value = 'Invalid email or empty';

                    }
                }
            }

        }


        function generateUsername(value) {

            if (value == "") {
                document.getElementById("uname").getElementsByTagName("input")[0].value = "";
            }
            else {
                document.getElementById("uname").getElementsByTagName("input")[0].value = value.replace(/ /g, '') +
                    (Math.floor(Math.random() * 50000) + 1).toString();
            }


        }

        function clearError() {
            let email = document.getElementById("emailvarify").value;
            if (email == 'Email already exists' || email == 'Invalid email or empty') {
                document.getElementById('emailvarify').value = '';
            }
        }
    </script>
    </body>
    </html>
    <?php
}

?>