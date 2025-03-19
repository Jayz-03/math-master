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

    <?php
    $sql = "SELECT user_id, firstname, lastname, GREATEST(gen_math_1st_score, gen_math_2nd_score) AS highest_score
        FROM users
        WHERE gen_math_1st_score IS NOT NULL AND gen_math_2nd_score IS NOT NULL
        ORDER BY highest_score DESC";

    $result = $link->query($sql);

    $top6 = [];
    $others = [];

    if ($result->num_rows > 0) {
        $rank = 1;
        while ($row = $result->fetch_assoc()) {
            if ($rank <= 6) {
                $top6[] = $row;
            } else {
                $others[] = $row;
            }
            $rank++;
        }
    }


    $sql2 = "SELECT user_id, firstname, lastname, GREATEST(stat_prob_1st_score, stat_prob_2nd_score) AS highest_score2
        FROM users
        WHERE stat_prob_1st_score IS NOT NULL AND stat_prob_2nd_score IS NOT NULL
        ORDER BY highest_score2 DESC";

    $result2 = $link->query($sql2);

    $top62 = [];
    $others2 = [];

    if ($result2->num_rows > 0) {
        $rank2 = 1;
        while ($row2 = $result2->fetch_assoc()) {
            if ($rank2 <= 6) {
                $top62[] = $row2;
            } else {
                $others2[] = $row2;
            }
            $rank2++;
        }
    }
    ?>

    <section class="our-facts" id="leaderboards">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>General Mathematics Leaderboards</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <?php if (count($top6) > 0): ?>
                                        <?php foreach ($top6 as $index => $user): ?>
                                            <div class="count-area-content">
                                                <div class="count-digit"><?php echo $index + 1; ?></div>
                                                <div class="count-title">
                                                    <?php echo $user['firstname'] . " " . $user['lastname']; ?> - Score:
                                                    <?php echo $user['highest_score']; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Statistics & Probability Leaderboards</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <?php if (count($top62) > 0): ?>
                                        <?php foreach ($top62 as $index2 => $user2): ?>
                                            <div class="count-area-content">
                                                <div class="count-digit"><?php echo $index2 + 1; ?></div>
                                                <div class="count-title">
                                                    <?php echo $user2['firstname'] . " " . $user2['lastname']; ?> - Score:
                                                    <?php echo $user2['highest_score2']; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-5">
                    <div class="main-button-red">
                        <a href="leaderboards">Show all leaderboards</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-lg-4">
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
                <div class="col"></div>
            </div>
        </div>
        <?php include "partials/footer.php"; ?>
    </section>


    <?php include "partials/script.php"; ?>

</body>

</html>