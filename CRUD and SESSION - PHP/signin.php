<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "links.php";
    ?>
    <title>Register yourself | MovieHub</title>
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form method="post" class="mx-1 mx-md-4">
                                        <p class="disabled" id="email-al"><i class="fa fa-warning"
                                                style="color: red;"></i> The email is Already Registered!</p>
                                        <p class="disabled" id="reg-unsucc"><i class="fa fa-warning"
                                                style="color: red;"></i> There was a problem in registering, please try
                                            again. </p>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                          
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control"
                                                    name="name" />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                          
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control"
                                                    name="email" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                          
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control"
                                                    name="pass" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <p class="disabled" id="pass-al"><i class="fa fa-warning"
                                                    style="color: red;"></i> The Password does not match!</p> 

                                          
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" class="form-control"
                                                    name="cpass" />
                                                <label class="form-label" for="form3Example4cd">Repeat your
                                                    password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button name="submit" type="submit"
                                                class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                        <p>Already have an account? <a href="login.php" style="text-decoration: none;">
                                                Login</a></p>

                                    </form>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>



<?php
include 'connection.php';


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    $pass_hash = password_hash($password, PASSWORD_BCRYPT);
    $cpass_hash = password_hash($cpassword, PASSWORD_BCRYPT);

    $email_check_query = "select * from register where email = '$email'";
    $result = mysqli_query($connection, $email_check_query);

    $email_count = mysqli_num_rows($result);

    if ($email_count > 0) {
?>
        <script>
            document.getElementById('email-al').style.display = 'block';
        </script>
        <?php
    } else {
        if ($password === $cpassword) {
            $insert_query = "insert into register(name, email, pass, conf_pass)
            values('$name', '$email', '$pass_hash', '$cpass_hash')";

            $result = mysqli_query($connection, $insert_query);


            if ($result) {
                header('location: login.php');
            } else {
            ?>
                <script>
                    document.getElementById('reg-unsucc').style.display = 'block';
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                    document.getElementById('pass-al').style.display = 'block';
            </script>
<?php
        }
    }
}
?>