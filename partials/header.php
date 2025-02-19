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
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#explore">Explore Topics</a></li>
                        <li class="scroll-to-section"><a href="#play">Play Challenges</a></li>
                        <li class="scroll-to-section"><a href="#guide">Guide</a></li>
                        <li class="scroll-to-section"><a href="#leaderboards">Leaderboards</a></li>
                        <?php
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                            ?>
                            <li><a href="signout">Signout</a></li>
                            <?php
                        } else {
                            ?>
                            <li class="scroll-to-section"><a href="#signup">Sign Up</a></li>
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