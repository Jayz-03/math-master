<?php
session_start();

require_once "DBConfig.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $sql = "SELECT * FROM users WHERE user_id = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
}

$active = "home";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "partials/head.php"; ?>
</head>

<body>
    <?php include "partials/header.php"; ?>

    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/course-video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>Gamified Learning Tool</h6>
                            <h2>Math Master</h2>
                            <p>Elevate your math skills with the Math Master, the ultimate tool for mastering senior
                                highschool general math and statistics at San Antonio de Padua.</p>
                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="#signup">Join Us Now!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-service-item owl-carousel">
                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/service-icon-02.png" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Mathematical Functions</h4>
                                <p>Learn about functions and how they model relationships in real-world problems.</p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/service-icon-02.png" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Financial Mathematics</h4>
                                <p>Understand interest, loans, and investments to manage personal and business finances.
                                </p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/service-icon-02.png" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Probability Theory</h4>
                                <p>Explore the fundamentals of chance and how probability is applied in decision-making.
                                </p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/service-icon-02.png" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Statistical Analysis</h4>
                                <p>Analyze data using statistical methods to draw meaningful conclusions.</p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/service-icon-02.png" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Graphing and Visualization</h4>
                                <p>Use graphs and charts to represent data clearly and effectively.</p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/service-icon-02.png" alt="">
                            </div>
                            <div class="down-content">
                                <h4>Hypothesis Testing</h4>
                                <p>Test assumptions and make data-driven conclusions using statistical methods.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="upcoming-meetings" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Explore Topics</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories">
                        <h4>Module List</h4>
                        <ul>
                            <li>
                                <a href="module-details?module=qtr1mod17">Exponential Functions, Equations and
                                    Inequalities
                                </a>
                            </li>
                            <li>
                                <a href="module-details?module=qtr1mod5">Rational Functions, Equations and
                                    Inequalities
                                </a>
                            </li>
                            <li>
                                <a href="module-details?module=qtr3mod1">Random Variables and Probability
                                    Distributions
                                </a>
                            </li>
                            <li>
                                <a href="module-details?module=qtr3mod2">Mean and Variance of Discrete Random
                                    Variable
                                </a>
                            </li>
                        </ul>
                        <div class="main-button-red">
                            <a href="explore-topics">All Modules</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span>QUARTER I</span>
                                    </div>
                                    <a href="module-details?module=qtr1mod17"><img src="assets/images/q1.png"
                                            alt=""></a>
                                </div>
                                <div class="down-content">
                                    <div class="date">
                                        <h6>MOD <span>17</span></h6>
                                    </div>
                                    <a href="module-details?module=qtr1mod17">
                                        <h4>General Mathematics</h4>
                                    </a>
                                    <p>Exponential Functions, Equations and Inequalities</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span>QUARTER I</span>
                                    </div>
                                    <a href="module-details?module=qtr1mod5"><img src="assets/images/q1.png" alt=""></a>
                                </div>
                                <div class="down-content">
                                    <div class="date">
                                        <h6>MOD <span>5</span></h6>
                                    </div>
                                    <a href="module-details?module=qtr1mod5">
                                        <h4>General Mathematics</h4>
                                    </a>
                                    <p>Rational Functions, Equations and Inequalities</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span>QUARTER III</span>
                                    </div>
                                    <a href="module-details?module=qtr3mod1"><img src="assets/images/q3.png" alt=""></a>
                                </div>
                                <div class="down-content">
                                    <div class="date">
                                        <h6>MOD <span>1</span></h6>
                                    </div>
                                    <a href="module-details?module=qtr3mod1">
                                        <h4>Statistics and Probability</h4>
                                    </a>
                                    <p>Random Variables and Probability Distributions</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span>QUARTER III</span>
                                    </div>
                                    <a href="module-details?module=qtr3mod2"><img src="assets/images/q3.png" alt=""></a>
                                </div>
                                <div class="down-content">
                                    <div class="date">
                                        <h6>MOD <span>2</span></h6>
                                    </div>
                                    <a href="module-details?module=qtr3mod2">
                                        <h4>Statistics and Probability</h4>
                                    </a>
                                    <p>Mean and Variance of Discrete Random Variable</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="apply-now" id="play">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="item">
                                <h3>GENERAL MATHEMATICS</h3>
                                <p>General Mathematics covers fundamental concepts such as functions, rational
                                    expressions, logarithms,
                                    and financial mathematics. These topics are essential for problem-solving in
                                    real-life applications,
                                    including business, economics, and everyday transactions.</p>
                                <div class="main-button-red">
                                    <div><a href="challenge-general-mathematics">Play
                                            Challenges!</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="item">
                                <h3>STATISTICS AND PROBABILITY</h3>
                                <p>Statistics and Probability focus on data analysis, measures of central tendency,
                                    probability distributions,
                                    and hypothesis testing. These concepts help in making informed decisions based on
                                    data and predicting outcomes
                                    in various fields such as science, business, and social research.</p>
                                <div class="main-button-yellow">
                                    <div><a href="challenge-statistics-and-probability">Play
                                            Challenges!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordions is-first-expanded">
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Why Learn General Mathematics?</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>General Mathematics provides essential skills for problem-solving, logical
                                        reasoning,
                                        and real-world applications such as budgeting, investments, and business
                                        planning.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Importance of Statistics and Probability</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Statistics and Probability play a key role in data-driven decision-making, risk
                                        analysis,
                                        and predicting trends in various industries such as finance, healthcare, and
                                        technology.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>How These Subjects Apply to Real Life</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Understanding mathematics and statistics enables individuals to make informed
                                        financial
                                        choices, analyze survey data, calculate probabilities in games, and enhance
                                        critical
                                        thinking skills in everyday scenarios.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion last-accordion">
                            <div class="accordion-head">
                                <span>Share This with Your Peers</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Encourage others to explore the practical applications of mathematics and
                                        statistics.
                                        Understanding these subjects can significantly impact decision-making and
                                        analytical skills.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-courses" id="guide">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Guide Courses</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="owl-courses-item owl-carousel">
                        <div class="item">
                            <img src="assets/images/guide1.jpg" alt="Course One">
                            <div class="down-content">
                                <h4>RATIONAL FUNCTIONS, EQUATIONS, AND INEQUALITIES || GRADE 11 GENERAL MATHEMATICS Q1
                                </h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="main-button-red">
                                                <a href="https://www.youtube.com/watch?v=BD3F1hL7YAA"
                                                    target="_blank">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/images/guide2.jpg" alt="Course One">
                            <div class="down-content">
                                <h4>EXPONENTIAL FUNCTIONS, EQUATIONS AND INEQUALITIES || GRADE 11 GENERAL MATHEMATICS Q1
                                </h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="main-button-red">
                                                <a href="https://www.youtube.com/watch?v=6AY2w3NViHY"
                                                    target="_blank">Learn
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/images/guide3.jpg" alt="Course One">
                            <div class="down-content">
                                <h4>OPERATIONS ON FUNCTIONS || GRADE 11 GENERAL MATHEMATICS Q1
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="main-button-red">
                                                <a href="https://www.youtube.com/watch?v=5t1HfD9Ywvw"
                                                    target="_blank">Learn
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/images/guide4.jpg" alt="Course One">
                            <div class="down-content">
                                <h4>BASIC CONCEPTS IN STATISTICS || MATHEMATICS IN THE MODERN WORLD
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="main-button-red">
                                                <a href="https://www.youtube.com/watch?v=NtfWQILgJyY"
                                                    target="_blank">Learn
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/images/guide5.jpg" alt="Course One">
                            <div class="down-content">
                                <h4>DISCRETE AND CONTINUOUS RANDOM VARIABLE || GRADE 11 STATISTICS AND PROBABILITY Q3
                                </h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="main-button-red">
                                                <a href="https://www.youtube.com/watch?v=aLPmK5Dx1QQ"
                                                    target="_blank">Learn
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/images/guide6.jpg" alt="Course One">
                            <div class="down-content">
                                <h4>MEAN OF DISCRETE PROBABILITY DISTRIBUTION || GRADE 11 STATISTICS AND PROBABILITY
                                </h4>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="main-button-red">
                                                <a href="https://www.youtube.com/watch?v=0x8LtCXZNKM"
                                                    target="_blank">Learn
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-facts" id="leaderboards">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Leaderboards</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="count-area-content">
                                        <div class="count-digit">1</div>
                                        <div class="count-title">Ranking (to be continue)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        ?>
        <section class="contact-us" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 align-self-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="contact" action="" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2>Let's get in touch</h2>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="name" type="text" id="name" placeholder="YOURNAME...*"
                                                    required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                                    placeholder="YOUR EMAIL..." required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="subject" type="text" id="subject" placeholder="SUBJECT...*"
                                                    required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <textarea name="message" type="text" class="form-control" id="message"
                                                    placeholder="YOUR MESSAGE..." required=""></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="button">SEND MESSAGE
                                                    NOW</button>
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
        <?php
    } else {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        echo '<meta http-equiv="Refresh" content="3; url=index">';
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
        <?php
    }
    ?>

    <?php include "partials/script.php"; ?>

</body>

</html>