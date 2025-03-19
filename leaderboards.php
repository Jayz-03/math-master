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
                    <h6>Signin to math master to play challenges</h6>
                    <h2>Leaderboards</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us" id="signup">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="contact" action="" method="post">
                                <div class="row">
                                    <?php
                                    // General Mathematics leaderboard query
                                    $sql = "SELECT user_id, firstname, lastname, GREATEST(gen_math_1st_score, gen_math_2nd_score) AS highest_score
        FROM users
        WHERE gen_math_1st_score IS NOT NULL AND gen_math_2nd_score IS NOT NULL
        ORDER BY highest_score DESC";

                                    $result = $link->query($sql);

                                    // Array to hold all users
                                    $general_math_leaderboard = [];

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $general_math_leaderboard[] = $row;
                                        }
                                    }

                                    // Statistics & Probability leaderboard query
                                    $sql2 = "SELECT user_id, firstname, lastname, GREATEST(stat_prob_1st_score, stat_prob_2nd_score) AS highest_score2
         FROM users
         WHERE stat_prob_1st_score IS NOT NULL AND stat_prob_2nd_score IS NOT NULL
         ORDER BY highest_score2 DESC";

                                    $result2 = $link->query($sql2);

                                    // Array to hold all users for statistics & probability
                                    $stat_prob_leaderboard = [];

                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            $stat_prob_leaderboard[] = $row2;
                                        }
                                    }
                                    ?>

                                    <!-- General Mathematics Leaderboard -->
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2>General Mathematics Leaderboards</h2>
                                            </div>
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Rank</th>
                                                            <th>Name</th>
                                                            <th>Highest Score</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (count($general_math_leaderboard) > 0): ?>
                                                            <?php foreach ($general_math_leaderboard as $index => $user): ?>
                                                                <tr>
                                                                    <td><?php echo $index + 1; ?></td>
                                                                    <td><?php echo $user['firstname'] . " " . $user['lastname']; ?>
                                                                    </td>
                                                                    <td><?php echo $user['highest_score']; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Statistics & Probability Leaderboard -->
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2>Statistics & Probability Leaderboards</h2>
                                            </div>
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Rank</th>
                                                            <th>Name</th>
                                                            <th>Highest Score</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (count($stat_prob_leaderboard) > 0): ?>
                                                            <?php foreach ($stat_prob_leaderboard as $index2 => $user2): ?>
                                                                <tr>
                                                                    <td><?php echo $index2 + 1; ?></td>
                                                                    <td><?php echo $user2['firstname'] . " " . $user2['lastname']; ?>
                                                                    </td>
                                                                    <td><?php echo $user2['highest_score2']; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-5">
                                        <div class="main-button-red">
                                            <a href="index">Back to Home</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>