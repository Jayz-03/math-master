<?php
session_start();
include('DBConfig.php');

if (isset($_SESSION['id'])) {
    $user_id = $_POST['user_id'];
    $score = $_POST['score'];

    if (!empty($score)) {
        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            if (empty($row['gen_math_1st_score'])) {
                $update_sql = "UPDATE users SET gen_math_1st_score = '$score' WHERE user_id = '$user_id'";
            } else {
                $update_sql = "UPDATE users SET gen_math_2nd_score = '$score', gen_math_score_datetime = NOW() WHERE user_id = '$user_id'";
            }

            if (mysqli_query($link, $update_sql)) {
                echo "Score updated successfully!";
            } else {
                echo "Error updating score: " . mysqli_error($link);
            }
        } else {
            echo "User not found!";
        }
    } else {
        echo "Score is empty!";
    }
} else {
    echo "User is not logged in.";
}
?>
