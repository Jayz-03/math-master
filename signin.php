<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index");
    exit;
}

require_once "DBConfig.php";

$email = $password = $email_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($email_err) && empty($password_err)) {
        $sql = "SELECT user_id, email, password FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = $email;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            header("location: index");
                        } else {
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid email or password.";
                }
            }
        } else {
            $login_err = "Invalid email or password.";
        }
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "partials/head.php"; ?>
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
                    <h6>Signin to math master to play challenges</h6>
                    <h2>Sign In</h2>
                </div>
            </div>
        </div>
    </section>

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
                                    <div class="col-lg-12">
                                        <label class="form-label">Email</label>
                                        <fieldset>
                                            <input type="text"
                                                class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                                                name="email" maxlength="500" placeholder="Email address"
                                                aria-required="true" value="<?php echo $email; ?>">
                                            <div class="invalid-feedback"><?php echo $email_err; ?>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
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
                                    </script>

                                    <div class="col-12 text-end mt-5 mb-3">
                                        <a href="index">Don't have an account? Signup here.</a>
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


<script
                                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>