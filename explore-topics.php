<?php
session_start();

require_once "DBConfig.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $sql = "SELECT * FROM users WHERE user_id = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
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
                            <?php
                            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                ?>
                                <li><a href="signout">Signout</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="signin">Sign In</a></li>
                                <?php
                            }
                            ?>
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
                    <h6>Here are our modules list</h6>
                    <h2>Modules</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="meetings-page" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filters">
                                <ul>
                                    <li data-filter="*" class="active">All Modules</li>
                                    <li data-filter=".q1">Quarter I</li>
                                    <li data-filter=".q3">Quarter III</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row grid">
                                <div class="col-lg-4 templatemo-item-col all q1">
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
                                <div class="col-lg-4 templatemo-item-col all q3">
                                    <div class="meeting-item">
                                        <div class="thumb">
                                            <div class="price">
                                                <span>QUARTER III</span>
                                            </div>
                                            <a href="module-details?module=qtr3mod1"><img src="assets/images/q3.png"
                                                    alt=""></a>
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
                                <div class="col-lg-4 templatemo-item-col all q1">
                                    <div class="meeting-item">
                                        <div class="thumb">
                                            <div class="price">
                                                <span>QUARTER I</span>
                                            </div>
                                            <a href="module-details?module=qtr1mod5"><img src="assets/images/q1.png"
                                                    alt=""></a>
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
                                <div class="col-lg-4 templatemo-item-col all q3">
                                    <div class="meeting-item">
                                        <div class="thumb">
                                            <div class="price">
                                                <span>QUARTER III</span>
                                            </div>
                                            <a href="module-details?module=qtr3mod2"><img src="assets/images/q3.png"
                                                    alt=""></a>
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
            </div>
        </div>
        <?php include "partials/footer.php"; ?>
    </section>

    <?php include "partials/script.php"; ?>
</body>

</html>