<?php
session_start();

require_once "DBConfig.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $sql = "SELECT * FROM users WHERE user_id = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
}// else {
//     header("location: signin");
// }
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
                    <h2>GENERAL MATHEMATICS</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us" id="signup">
        <div class="container">
            <div class="start-screen">
                <h1 class="heading">PLAY CHALLENGES!</h1>
                <button class="btn start">Start Quiz</button>
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
                <button class="btn restart">Restart Quiz</button>
            </div>
        </div>

        <script>
            const questions = [
                { question: "<b>Operations on Functions</b>: The sum of two functions 𝑓(𝑥) and 𝑔(𝑥) is written as (𝑓+𝑔)(𝑥)=𝑓(𝑥) + 𝑔(𝑥).", answers: ["True", "False", "Maybe", "None of the Above"], correct: 0, explo_solution: "" },
                { question: "<b>Operations on Functions</b>: The product of two functions 𝑓(𝑥) and 𝑔(𝑥) is written as (𝑓 ⋅ 𝑔)(𝑥)=𝑓(𝑥) ⋅ 𝑔(𝑥).", answers: ["True", "False", "Maybe", "None of the Above"], correct: 0, explo_solution: "" },
                { question: "<b>Operations on Functions</b>: If 𝑓(𝑥) = 𝑥+5 and 𝑔(𝑥) = 2𝑥−1, what is (𝑓+𝑔)(𝑥)?", answers: ["3𝑥 + 4", "4𝑥 + 4", "3𝑥 + 5", "4𝑥 + 5"], correct: 0, explo_solution: "assets/explo-solution/gen-math-3.png" },
                { question: "<b>Operations on Functions</b>: If 𝑓(𝑥) = 𝑥+5 and 𝑔(𝑥) = 2𝑥−1, what is (𝑓−𝑔)(𝑥)?", answers: ["𝑥 + 7", "-𝑥 + 7", "-𝑥 + 6", "𝑥 + 6"], correct: 2, explo_solution: "assets/explo-solution/gen-math-4.png" },
                { question: "<b>Operations on Functions</b>: If 𝑓(𝑥) = 𝑥+5 and 𝑔(𝑥) = 2𝑥−1, what is (𝑓 ⋅ 𝑔)(𝑥)?", answers: ["2𝑥² + 8𝑥 − 5", "2𝑥² + 9𝑥 − 5", "2𝑥² - 8𝑥 − 6", "2𝑥² - 9𝑥 − 6"], correct: 1, explo_solution: "assets/explo-solution/gen-math-5.png" },
                { question: "<b>Rational Function, Equation, and Inequality</b>: Which of the following is an example of a rational function?", answers: ["𝑓(𝑥) = 𝑥 + 2", "𝑓(𝑥) = 𝑥² + 1 / 𝑥 - 3", "𝑓(𝑥) = 2ˣ", "𝑓(𝑥) = √𝑥"], correct: 1, explo_solution: "" },
                { question: "<b>Rational Function, Equation, and Inequality</b>: Which of the following represents a rational function?", answers: ["𝑓(𝑥) = 2𝑥 + 5", "𝑓(𝑥) = 2𝑥 + 5 / 𝑥 - 3", "𝑓(𝑥) = 3ˣ", "𝑓(𝑥) = 𝑥² + 7𝑥 + 10"], correct: 1, explo_solution: "assets/explo-solution/gen-math-7.png" },
                { question: "<b>Rational Function, Equation, and Inequality</b>: Which of the following is NOT an example of a rational expression?", answers: ["3𝑥² −5𝑥 + 2", "2 / 𝑥 - 5", "√𝑥 - 4 / 2𝑥 + 1", "𝑥 + 5"], correct: 2, explo_solution: "assets/explo-solution/gen-math-8.png" },
                { question: "<b>Rational Function, Equation, and Inequality</b>: Solve for 𝑥 (𝑥+2) (𝑥-3) = 2 in the equation", answers: ["𝑥 = 4", "𝑥 = 5", "𝑥 = 8", "𝑥 = 9"], correct: 2, explo_solution: "assets/explo-solution/gen-math-9.png" },
                { question: "<b>Rational Function, Equation, and Inequality</b>: Consider the rational function 𝑓(𝑥) = 2𝑥²-8 / 𝑥-4. Determine the value of 𝑥 that makes 𝑓(𝑥) = 0.", answers: ["𝑥 = 2", "𝑥 = 3", "𝑥 = 4", "𝑥 = 5"], correct: 0, explo_solution: "assets/explo-solution/gen-math-10.png" },
                { question: "<b>Exponential Function, Equation, and Inequality</b>: The function 𝑓(𝑥) = 3ˣ is an example of ___________.", answers: ["Exponential Equation", "Exponential Inequality", "Exponential Function", "None of the Above"], correct: 2, explo_solution: "" },
                { question: "<b>Exponential Function, Equation, and Inequality</b>: It is an inequality in which one or both sides involve a variable exponent.", answers: ["Exponential Equation", "Exponential Inequality", "Exponential Function", "None of the Above"], correct: 1, explo_solution: "" },
                { question: "<b>Exponential Function, Equation, and Inequality</b>: The standard form of an exponential function is 𝑓(𝑥) = 𝑎𝑏ˣ, where a ≠ 0, 𝑏 > 0, 𝑎𝑛𝑑 𝑏 ≠ 1", answers: ["True", "False", "Maybe", "None of the Above"], correct: 0, explo_solution: "" },
                { question: "<b>Exponential Function, Equation, and Inequality</b>: The function 𝑔(𝑥) = 5𝑥, where 𝑎 ≠ is an example of exponential function.", answers: ["True", "False", "Maybe", "None of the Above"], correct: 0, explo_solution: "" },
                { question: "<b>Exponential Function, Equation, and Inequality</b>: Exponential inequality is an equation in which a variable occurs as part of the index or exponent.", answers: ["True", "False", "Maybe", "None of the Above"], correct: 1, explo_solution: "assets/explo-solution/gen-math-15.png" }
            ];

            const progressBar = document.querySelector(".progress-bar"),
                progressText = document.querySelector(".progress-text");

            const progress = (value) => {
                const percentage = (value / 120) * 100;
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

            let time = 120, score = 0, currentQuestion = 0, timer;

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
                time = 120;
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