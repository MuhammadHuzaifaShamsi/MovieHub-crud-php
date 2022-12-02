<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "links.php";
    ?>
    <title>Login | MovieHub</title>
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

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</p>

                                    <form class="mx-1 mx-md-4" method="post">
                                    <p class="disabled" id="pass-al"><i class="fa fa-warning"
                                                style="color: red;"></i> Invalid Password please try again!</p>
                                    <p class="disabled" id="email-al"><i class="fa fa-warning"
                                                style="color: red;"></i> The email is Invalid!</p>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                           
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control" name="email" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                           
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control" name="pass" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
                                        </div>

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

session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $email_check_query = "select * from register where email = '$email'";
    $result = mysqli_query($connection, $email_check_query);

    $email_count = mysqli_num_rows($result);

    if ($email_count) {
        $email_pass = mysqli_fetch_assoc($result);
        $dbpass = $email_pass['pass'];
        $_SESSION['name'] = $email_pass['name'];

        $password_decode = password_verify($password, $dbpass);

        if($password_decode){
            header('location: index.php');
        }
        else{
            ?>
            <script>
            document.getElementById('pass-al').style.display = 'block';
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            document.getElementById('email-al').style.display = 'block';
        </script>
<?php
    }
}
?>