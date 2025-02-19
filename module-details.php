<?php
session_start();

require_once "DBConfig.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $sql = "SELECT * FROM users WHERE user_id = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_GET['module'])) {
    $module = htmlspecialchars($_GET['module']);
} else {
    $module = 'Unknown';
}

if ($module == "qtr1mod17") {
    $image_path = "assets/images/q1_1.png";
    $pdf_path = "assets/pdf/genmath_q1_mod17.pdf";
    $qtr = "I";
    $mod = "17";
    $title = "General Mathematics";
    $sub_title = "Exponential Functions, Equations and Inequalities";
} elseif ($module == "qtr1mod5") {
    $image_path = "assets/images/q1_1.png";
    $pdf_path = "assets/pdf/genmath_q1_mod5.pdf";
    $qtr = "I";
    $mod = "5";
    $title = "General Mathematics";
    $sub_title = "Rational Functions, Equations and Inequalities";
} elseif ($module == "qtr3mod1") {
    $image_path = "assets/images/q3_1.png";
    $pdf_path = "assets/pdf/statsprob_q3_mod1.pdf";
    $qtr = "III";
    $mod = "1";
    $title = "Statistics & Probability";
    $sub_title = "Random Variables and Probability Distributions";
} elseif ($module == "qtr3mod2") {
    $image_path = "assets/images/q3_1.png";
    $pdf_path = "assets/pdf/statsprob_q3_mod2.pdf";
    $qtr = "III";
    $mod = "2";
    $title = "Statistics & Probability";
    $sub_title = "Mean and Variance of Discrete Random Variable";
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
                    <h6><?php echo $title . ": QUARTER " . $qtr . " - MODULE " . $mod ; ?></h6>
                    <h2><?php echo $sub_title; ?></h2>
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
                            <div class="meeting-single-item">
                                <div class="thumb">
                                    <div class="price">
                                        <span>QUARTER <?php echo $qtr; ?></span>
                                    </div>
                                    <div class="date">
                                        <h6>MOD <span><?php echo $mod; ?></span></h6>
                                    </div>
                                    <a href="#"><img src="<?php echo $image_path; ?>" alt=""></a>
                                </div>
                                <div class="down-content">
                                    <p><?php echo $title . ": QUARTER " . $qtr . " - MODULE " . $mod ; ?></p>
                                    <a href="#">
                                        <h4><?php echo $sub_title; ?></h4>
                                    </a>
                                    <div class="row">
                                        <div class="col-12">
                                            <iframe src="<?php echo $pdf_path; ?>" width="100%" height="1200px"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="main-button-red">
                                <a href="explore-topics">Back To Module List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "partials/footer.php"; ?>
    </section>


    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

    <script>
        var url = "<?php echo $pdf_path; ?>";

        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

        pdfjsLib.getDocument(url).promise.then(function (pdf) {
            pdf.getPage(1).then(function (page) {
                var scale = 1.5;
                var viewport = page.getViewport({ scale: scale });
                var canvas = document.getElementById('pdfCanvas');
                var context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        });
    </script>

    <?php include "partials/script.php"; ?>
</body>


</html>