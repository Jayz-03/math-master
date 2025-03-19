<?php
session_start();

require_once "DBConfig.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $sql = "SELECT * FROM users WHERE user_id = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    header("location: signin");
}

$statprob_first_attempt = $row['stat_prob_1st_score'];
$statprob_second_attempt = $row['stat_prob_2nd_score'];

if ($statprob_first_attempt == "" && $statprob_second_attempt == "") {
    $statprob_attempt = 1;
} else if ($statprob_first_attempt != "" && $statprob_second_attempt == "") {
    $statprob_attempt = 2;
} else {
    $statprob_attempt = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "partials/head.php"; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        @import url(https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic);

        .heading {
            text-align: center;
            font-size: 40px;
            color: #fff;
            margin-bottom: 50px;
        }

        label {
            display: block;
            font-size: 12px;
            margin-bottom: 10px;
            color: #fff;
        }

        select {
            width: 100%;
            padding: 10px;
            border: none;
            text-transform: capitalize;
            border-radius: 5px;
            margin-bottom: 20px;
            background: #fff;
            color: #1f2847;
            font-size: 14px;
        }

        .start-screen .btn {
            margin-top: 50px;
        }

        .hide {
            display: none;
        }

        .timer {
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-bottom: 30px;
        }

        .timer .progress {
            position: relative;
            width: 100%;
            height: 40px;
            background: transparent;
            border-radius: 30px;
            overflow: hidden;
            margin-bottom: 10px;
            border: 3px solid #3f4868;
        }

        .timer .progress .progress-bar {
            width: 100%;
            height: 100%;
            border-radius: 30px;
            overflow: hidden;
            background: linear-gradient(to right, #a12c2f, #ffc107);
            transition: 1s linear;
        }

        .timer .progress .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 16px;
            font-weight: 500;
        }

        .question-wrapper .number {
            color: #a2aace;
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .question-wrapper .number .total {
            color: #576081;
            font-size: 18px;
        }

        .question-wrapper .question {
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .answer-wrapper .answer {
            width: 100%;
            height: 60px;
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            border: 3px solid #3f4868;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            cursor: pointer;
            transition: 0.3s linear;
        }

        .answer .checkbox {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 3px solid #3f4868;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .answer .checkbox i {
            color: #fff;
            font-size: 10px;
            opacity: 0;
            transition: all 0.3s;
        }

        .answer:hover:not(.checked) .checkbox,
        .answer.selected .checkbox {
            background-color: #a12c2f;
            border-color: #a12c2f;
        }

        .answer.selected .checkbox i {
            opacity: 1;
        }

        .answer.correct {
            border-color: #0cef2a;
        }

        .answer.wrong {
            border-color: #fc3939;
        }

        .question-wrapper,
        .answer-wrapper {
            margin-bottom: 50px;
        }

        .btn {
            width: 100%;
            height: 60px;
            background: #a12c2f;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s linear;
        }

        .btn:hover {
            background: rgb(133, 33, 36);
        }

        .btn1 {
            width: 100%;
            height: 60px;
            background: #17a2b8;
            border: none;
            border-radius: 10px 10px 0px 0px;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s linear;
        }

        .btn1:hover {
            background:rgb(17, 122, 138);
        }

        .solution-image {
            border-radius: 0px 0px 10px 10px;
        }

        .btn:disabled {
            background: #576081;
            cursor: not-allowed;
        }

        .btn.next {
            display: none;
        }

        .end-screen .score {
            color: #fff;
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 80px;
            text-align: center;
        }

        .score .score-text {
            color: #a2aace;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 120px;
        }

        @media (max-width: 468px) {
            .container {
                min-height: 100vh;
                max-width: 100%;
                border-radius: 0;
            }
        }
    </style>
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
                    <h6>PLAY CHALLENGES!</h6>
                    <h2>STATISTICS AND PROBABILITY</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us" id="signup">
        <div class="container">
            <div class="start-screen">
                <h1 class="heading">PLAY CHALLENGES!</h1>
                <?php
                if ($statprob_attempt == 0) {
                    ?>
                    <button class="btn start" disabled>No More Attempt</button>
                    <?php
                } else {
                    ?>
                    <button class="btn start">Start</button>
                    <?php
                }
                ?>
            </div>
            <div class="quiz hide">
                <div class="timer">
                    <div class="progress">
                        <div class="progress-bar"></div>
                        <span class="progress-text"></span>
                    </div>
                </div>
                <div class="question-wrapper">
                    <div class="number">
                        Question <span class="current">1</span> / 15
                    </div>
                    <div class="question">This is a question?</div>
                </div>
                <div class="answer-wrapper"></div>
                
                <button class="btn1 toggle-solution hide">Show Solution</button>
                <img class="solution-image hide" src="" alt="Solution Image">

                <button class="btn submit mt-3" disabled>Submit</button>
                <button class="btn next hide mt-3">Next</button>


            </div>
            <div class="end-screen hide">
                <h1 class="heading">Quiz App</h1>
                <div class="score">
                    <span class="score-text">Your score:</span>
                    <div>
                        <span class="final-score">0</span> / 15
                    </div>
                </div>
                <?php
                if ($statprob_attempt == 1) {
                    ?>
                    <button class="btn restart">
                        Take 2nd Attempt
                    </button>
                    <?php
                } else {
                    ?>
                    <a href="index" class="btn">
                        No More Attempt | Back to Home
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>

        <script>
            const questions = [
                { question: "<b>Levels of Measurement</b>: The nominal level of measurement involves data that can be ordered or ranked.", answers: ["True", "False", "Maybe", "None of the Above"], correct: 1, explo_solution: "" },
                { question: "<b>Levels of Measurement</b>: Which of the following is an example of an ordinal level of measurement?", answers: ["Temperature in Celsius", "Number of Siblings", "Age in Years", "Level of Satisfaction"], correct: 3, explo_solution: "" },
                { question: "<b>Levels of Measurement</b>: Which of the following is an example of an ordinal level of measurement?", answers: ["The temperature in Fahrenheit", "The number of cars in a parking lot", "Rankings of students in a competition (1st, 2nd, 3rd)", "The amount of time spent on a task in hours"], correct: 2, explo_solution: "" },
                { question: "<b>Levels of Measurement</b>: What level of measurement allows for ranking and comparison of data but does NOT have a true zero point?", answers: ["Nominal", "Ordinal", "Interval", "Ratio"], correct: 2, explo_solution: "" },
                { question: "<b>Levels of Measurement</b>: Which level of measurement is used for classifying students based on their hair color?", answers: ["Nominal", "Ordinal", "Interval", "Ratio"], correct: 0, explo_solution: "" },
                { question: "<b>Discrete and Continuous Random Variables</b>: Which of the following is an example of a discrete random variable?", answers: ["The time it takes to finish a test", "The number of students in a classroom", "The height of a basketball player", "The weight of a newborn baby"], correct: 1, explo_solution: "" },
                { question: "<b>Discrete and Continuous Random Variables</b>: Which of the following represents a discrete random variable?", answers: ["The weight of a randomly selected person", "The number of students in a classroom", "The height of a randomly selected tree", "The amount of rainfall in a month"], correct: 1, explo_solution: "" },
                { question: "<b>Discrete and Continuous Random Variables</b>: Which of the following is an example of continuous random variable?", answers: ["Numbers of planet around the Sun", "Weight of students in grade 11 STEM C", "Numbers of students present in a classroom", "The numbers of oranges sold per day "], correct: 1, explo_solution: "" },
                { question: "<b>Discrete and Continuous Random Variables</b>: Which of the following represents a continuous random variable?", answers: ["Number of students in a class", "Number of cars in a parking lot", "Height of a basketball player", "Number of books on a shelf"], correct: 2, explo_solution: "" },
                { question: "<b>Discrete and Continuous Random Variables</b>: The number of students in a classroom is an example of a continuous random variable.", answers: ["True", "False", "Maybe", "None of the Above"], correct: 1, explo_solution: "" },
                { question: "<b>Mean and Variance</b>: Which of the following statements is true about the mean and variance of a dataset?", answers: ["The mean measures the spread of the data, while the variance measures the central tendency.", "The mean and variance are always equal for any dataset.", "The mean measures the central tendency of the data, while the variance measures the spread of the data.", "The mean and variance are both measures of the central tendency of the data."], correct: 2, explo_solution: "" },
                { question: "<b>Mean and Variance</b>: The measure of how spread out the values in a data set is called ____________.", answers: ["Variance", "Standard Deviation", "Mean", "None of the Above"], correct: 0, explo_solution: "" },
                { question: "<b>Mean and Variance</b>: Given the data set: 2, 5, 7, 10, 15, and 16. Calculate the mean.", answers: ["9.17", "4.67", "12.2", "6.39"], correct: 0, explo_solution: "assets/explo-solution/stat-prob-13.png" },
                { question: "<b>Mean and Variance</b>: Given the data set: 4, 7, 8, 5, and 6. Calculate the mean.", answers: ["4", "5", "6", "7"], correct: 2, explo_solution: "assets/explo-solution/stat-prob-14.png" },
                { question: "<b>Mean and Variance</b>: Given the data set: 3, 5, 7, 9, 11. Calculate the mean.", answers: ["7", "8", "9", "10"], correct: 0, explo_solution: "assets/explo-solution/stat-prob-15.png" }
            ];

            const progressBar = document.querySelector(".progress-bar"),
                progressText = document.querySelector(".progress-text");

            const progress = (value) => {
                const percentage = (value / 180) * 100;
                progressBar.style.width = `${percentage}%`;
                progressText.innerHTML = `${value}`;
            };

            const startBtn = document.querySelector(".start"),
                quiz = document.querySelector(".quiz"),
                startScreen = document.querySelector(".start-screen"),
                submitBtn = document.querySelector(".submit"),
                nextBtn = document.querySelector(".next"),
                endScreen = document.querySelector(".end-screen"),
                finalScore = document.querySelector(".final-score");

            let time = 180, score = 0, currentQuestion = 0, timer;

            const correctSound = new Audio("assets/sounds/correct.mp3");
            const wrongSound = new Audio("assets/sounds/wrong.mp3");
            const countdownSound = new Audio("assets/sounds/countdown.mp3");

            const startQuiz = () => {
                startScreen.classList.add("hide");
                quiz.classList.remove("hide");
                showQuestion(questions[currentQuestion]);
            };

            startBtn.addEventListener("click", startQuiz);

            const showQuestion = (question) => {
                document.querySelector(".question").innerHTML = question.question;
                document.querySelector(".answer-wrapper").innerHTML = question.answers
                    .map((answer, index) => `
                <div class="answer" data-index="${index}">
                    <span class="text">${answer}</span>
                    <span class="checkbox"><i class="fas fa-check"></i></span>
                </div>
            `).join("");

                document.querySelector(".number .current").textContent = currentQuestion + 1;
                submitBtn.disabled = true;
                submitBtn.style.display = "block"; // Show submit button
                nextBtn.style.display = "none"; // Hide next button

                const solutionBtn = document.querySelector(".toggle-solution");
                const solutionImg = document.querySelector(".solution-image");

                solutionBtn.classList.add("hide");
                solutionImg.classList.add("hide");
                solutionImg.src = "";
                answerSubmitted = false;

                document.querySelectorAll(".answer").forEach((answer) => {
                    answer.addEventListener("click", () => {
                        document.querySelectorAll(".answer").forEach(a => a.classList.remove("selected"));
                        answer.classList.add("selected");
                        submitBtn.disabled = false;
                    });
                });

                startTimer();
            };

            document.querySelector(".submit").addEventListener("click", () => {
                answerSubmitted = true;
                const currentQuestionObj = questions[currentQuestion];
                if (currentQuestionObj.explo_solution) {
                    document.querySelector(".toggle-solution").classList.remove("hide");
                    document.querySelector(".solution-image").src = currentQuestionObj.explo_solution;
                }
            });

            document.querySelector(".toggle-solution").addEventListener("click", () => {
                if (!answerSubmitted) return;

                const solutionImg = document.querySelector(".solution-image");
                if (solutionImg.classList.contains("hide")) {
                    solutionImg.classList.remove("hide");
                    document.querySelector(".toggle-solution").textContent = "Hide Solution/Explanation";
                } else {
                    solutionImg.classList.add("hide");
                    document.querySelector(".toggle-solution").textContent = "Show Solution/Explanation";
                }
            });

            const startTimer = () => {
                time = 180;
                progress(time);
                clearInterval(timer);
                timer = setInterval(() => {
                    if (time === 3) countdownSound.play();
                    if (time > 0) {
                        time--;
                        progress(time);
                    } else {
                        clearInterval(timer);
                        autoFail(); // Auto-fail when time runs out
                    }
                }, 1000);
            };

            submitBtn.addEventListener("click", () => {
                checkAnswer();
            });

            nextBtn.addEventListener("click", () => {
                nextQuestion();
                submitBtn.style.display = "block";  // Show submit button
                nextBtn.style.display = "none";     // Hide next button
            });

            function checkAnswer() {
                clearInterval(timer);
                const selectedAnswer = document.querySelector(".answer.selected");
                if (selectedAnswer) {
                    const answerIndex = parseInt(selectedAnswer.getAttribute("data-index"));
                    if (answerIndex === questions[currentQuestion].correct) {
                        score++;
                        selectedAnswer.classList.add("correct");
                        correctSound.play();
                    } else {
                        selectedAnswer.classList.add("wrong");
                        document.querySelector(`.answer[data-index='${questions[currentQuestion].correct}']`).classList.add("correct");
                        wrongSound.play();
                    }
                }

                submitBtn.style.display = "none";  // Hide submit button
                nextBtn.style.display = "block";   // Show next button
            }

            function autoFail() {
                const correctAnswer = document.querySelector(`.answer[data-index='${questions[currentQuestion].correct}']`);
                document.querySelectorAll(".answer").forEach(a => a.classList.remove("selected"));

                if (correctAnswer) {
                    correctAnswer.classList.add("correct");
                }

                wrongSound.play();

                submitBtn.style.display = "none"; // Hide submit button
                nextBtn.style.display = "block"; // Show next button
            }

            function nextQuestion() {
                if (currentQuestion < questions.length - 1) {
                    currentQuestion++;
                    showQuestion(questions[currentQuestion]);
                    submitBtn.style.display = "block";  // Show submit button
                    nextBtn.style.display = "none";     // Hide next button
                } else {
                    showScore();
                }
            }

            function showScore() {
                endScreen.classList.remove("hide");
                quiz.classList.add("hide");
                finalScore.textContent = score;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "statprob-update-score.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                var user_id = <?php echo $_SESSION['id']; ?>;
                var data = "user_id=" + user_id + "&score=" + score;

                xhr.send(data);

                xhr.onload = function () {
                    if (xhr.status == 200) {
                        console.log(xhr.responseText);
                    } else {
                        console.log("Error updating score");
                    }
                };
            }

            document.querySelector(".restart").addEventListener("click", () => {
                window.location.reload();
            });
        </script>

        <?php include "partials/footer.php"; ?>
    </section>




    <?php include "partials/script.php"; ?>
</body>

</html>