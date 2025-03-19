<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index");
    exit;
}

require_once "DBConfig.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "partials/head.php"; ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8">
                    <div class="left-content">
                        <p><em>Math Master</em>: Conquer Challenges, Unleash Your Skills.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="right-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index" class="logo">
                            Math Master
                        </a>
                        <ul class="nav">
                            <li><a href="index">Home</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="heading-page header-text" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6>Signup to math master to play challenges</h6>
                    <h2>Sign Up</h2>
                </div>
            </div>
        </div>
    </section>

    <?php

    $firstname = $username = $lastname = $email = $password = $confirm_password = "";
    $firstname_err = $username_err = $lastname_err = $email_err = $password_err = $confirm_password_err = "";

    if (isset($_POST['submit'])) {

        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter an email.";
        } else {
            $param_email = trim($_POST["email"]);

            // Check if the email ends with @sapc.edu.ph
            if (!preg_match("/^[a-zA-Z0-9._%+-]+@sapc\.edu\.ph$/", $param_email)) {
                $email_err = "Only email addresses associated with SAPC are allowed.";
            } else {
                $sql = "SELECT user_id FROM users WHERE email = ?";

                if ($stmt = mysqli_prepare($link, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $param_email);

                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_store_result($stmt);

                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            $email_err = "This email is already taken.";
                        } else {
                            $email = $param_email;
                        }
                    } else {
                        echo "<script>swal({
                                title: 'Oops!',
                                text: 'Something went wrong. Please try again later.',
                                icon: 'warning',
                                button: 'Done!',
                            });</script>";
                    }

                    mysqli_stmt_close($stmt);
                }
            }
        }


        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter an username.";
        } else {
            $sql = "SELECT user_id FROM users WHERE username = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                $param_username = trim($_POST["username"]);

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $username_err = "This username is already taken.";
                    } else {
                        $username = trim($_POST["username"]);
                    }
                } else {
                    echo "<script>swal({
                            title: 'Oops!',
                            text: 'Something went wrong. Please try again later.',
                            icon: 'warning',
                            button: 'Done!',
                        });</script>";
                }

                mysqli_stmt_close($stmt);
            }
        }


        if (empty(trim($_POST["firstname"]))) {
            $firstname_err = "Please enter first name.";
        } else {
            $firstname = trim($_POST["firstname"]);
        }

        if (empty(trim($_POST["lastname"]))) {
            $lastname_err = "Please enter last name.";
        } else {
            $lastname = trim($_POST["lastname"]);
        }

        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 8) {
            $password_err = "Password must have at least 8 characters.";
        } elseif (!preg_match('/[A-Z]/', trim($_POST["password"]))) {
            $password_err = "Password must include at least one uppercase letter.";
        } elseif (!preg_match('/[a-z]/', trim($_POST["password"]))) {
            $password_err = "Password must include at least one lowercase letter.";
        } elseif (!preg_match('/[0-9]/', trim($_POST["password"]))) {
            $password_err = "Password must include at least one number.";
        } elseif (!preg_match('/[\W]/', trim($_POST["password"]))) {
            $password_err = "Password must include at least one special character.";
        } else {
            $password = trim($_POST["password"]);
        }


        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm your password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if ($password != $confirm_password) {
                $confirm_password_err = "Passwords did not match.";
            }
        }

        if (empty($firstanme_err) && empty($lastname_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

            $sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssss", $param_firstname, $param_lastname, $param_username, $param_email, $param_password);

                $param_firstname = $firstname;
                $param_lastname = $lastname;
                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>swal({
                            title: 'Success!',
                            text: 'Account Registered Successfully!',
                            icon: 'success',
                            closeOnClickOutside: false,
                            button: false
                        });</script>";
                    echo '<meta http-equiv="Refresh" content="3; url=signin">';
                } else {
                    echo "<script>swal({
                            title: 'Oops!',
                            text: 'Something went wrong. Please try again later.',
                            icon: 'warning',
                            button: 'Done!',
                        });</script>";
                }

                mysqli_stmt_close($stmt);
            }
        }

        mysqli_close($link);
    }

    ?>

    <style>
        .invalid-feedback {
            margin-left: 10px;
            margin-top: -30px !important;
            margin-bottom: 10px !important;
        }

        .form-label {
            margin-left: 10px;
            margin-top: 20px !important;
            margin-bottom: -5px !important;
        }
    </style>
    <section class="contact-us" id="signup">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="contact" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Let's get started</h2>
                                    </div>
                                    <div class="col-lg-5">
                                        <label class="form-label">Username</label>
                                        <fieldset>
                                            <input type="text" id="sysuser-sys_username"
                                                class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                                name="username" maxlength="500" placeholder="Username"
                                                aria-required="true" value="<?php echo $username; ?>">
                                            <div class="invalid-feedback"><?php echo $username_err; ?>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-7">
                                        <label class="form-label">Email</label>
                                        <fieldset>
                                            <input type="text"
                                                class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                                                name="email" maxlength="500" placeholder="Email address"
                                                aria-required="true" value="<?php echo $email; ?>">
                                            <div class="invalid-feedback"><?php echo $email_err; ?>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">First Name</label>
                                        <fieldset>
                                            <input type="text"
                                                class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?> text-input"
                                                name="firstname" maxlength="500" placeholder="First name"
                                                aria-required="true" value="<?php echo $firstname; ?>">
                                            <div class="invalid-feedback"><?php echo $firstname_err; ?></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Last Name</label>
                                        <fieldset>
                                            <input type="text"
                                                class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?> text-input"
                                                name="lastname" maxlength="500" placeholder="Last name"
                                                aria-required="true" value="<?php echo $lastname; ?>">
                                            <div class="invalid-feedback"><?php echo $lastname_err; ?>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Password</label>
                                        <fieldset class="password-container">
                                            <input type="password" id="sysuser-sys_password"
                                                class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                                name="password" maxlength="500" placeholder="Password"
                                                aria-required="true" value="<?php echo $password; ?>">
                                            <i class="fa fa-eye toggle-password" data-target="sysuser-sys_password"></i>
                                        </fieldset>
                                        <div class="invalid-feedback">
                                            <?php echo $password_err; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Confirm Password</label>
                                        <fieldset class="password-container">
                                            <input type="password" id="sysuser-password_repeat"
                                                class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                                                name="confirm_password" placeholder="Verify Password"
                                                aria-required="true" value="<?php echo $confirm_password; ?>">
                                            <i class="fa fa-eye toggle-password"
                                                data-target="sysuser-password_repeat"></i>
                                        </fieldset>
                                        <div class="invalid-feedback">
                                            <?php echo $confirm_password_err; ?>
                                        </div>
                                    </div>

                                    <style>
                                        .password-container {
                                            position: relative;
                                            display: flex;
                                            align-items: center;
                                        }

                                        .password-container input {
                                            width: 100%;
                                            padding-right: 40px;
                                        }

                                        .password-container .toggle-password {
                                            position: absolute;
                                            right: 10px;
                                            top: 20px;
                                            transform: translateY(-50%);
                                            cursor: pointer;
                                            color: #999;
                                        }

                                        .password-container .toggle-password:hover {
                                            color: #333;
                                        }

                                        .invalid-feedback {
                                            display: block;
                                            margin-top: 5px;
                                        }
                                    </style>

                                    <script>
                                        document.querySelectorAll('.toggle-password').forEach(icon => {
                                            icon.addEventListener('click', function () {
                                                var input = document.getElementById(this.getAttribute('data-target'));
                                                if (input.type === "password") {
                                                    input.type = "text";
                                                    this.classList.remove("fa-eye");
                                                    this.classList.add("fa-eye-slash");
                                                } else {
                                                    input.type = "password";
                                                    this.classList.remove("fa-eye-slash");
                                                    this.classList.add("fa-eye");
                                                }
                                            });
                                        });

                                        document.getElementById('toggle-passwords').addEventListener('change', function () {
                                            var passwordFields = [
                                                document.getElementById('sysuser-sys_password'),
                                                document.getElementById('sysuser-password_repeat')
                                            ];

                                            passwordFields.forEach(field => {
                                                field.type = this.checked ? 'text' : 'password';
                                            });
                                        });
                                    </script>

                                    <div class="col-12 text-end mt-5 mb-3">
                                        <a href="signin">Already have an account? Signin here.</a>
                                    </div>


                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" name="submit" class="button">SIGN
                                                UP</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="right-info">
                        <ul>
                            <li>
                                <h6>Phone Number</h6>
                                <span>0991-071-4891</span>
                            </li>
                            <li>
                                <h6>Email Address</h6>
                                <span>jb.manalac@sapc.edu.phu</span>
                                <span>klc.pitogo@sapc.edu.ph</span>
                            </li>
                            <li>
                                <h6>Street Address</h6>
                                <span>National Highway Brgy. Sta. Clara Sur, Pila Laguna</span>
                            </li>
                            <li>
                                <h6>Website URL</h6>
                                <span>www.mathmaster.edu</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php include "partials/footer.php"; ?>
    </section>

    <?php include "partials/script.php"; ?>
</body>

</html>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>