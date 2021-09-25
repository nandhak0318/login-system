<?php
include './dbc.php';
session_start();
if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $query = $conn->prepare(
        "SELECT name,dob,age,gender,contact,city FROM user_data WHERE user_id = '$uid'"
    );
    $query->execute();
    $res = $query->get_result()->fetch_assoc();
    if (!$res) {
        echo json_encode(['statusCode' => 203]);
    } else {
        echo json_encode(['res' => $res]);
    }
} else {
    header('location: ../index.php');
    exit();
}
