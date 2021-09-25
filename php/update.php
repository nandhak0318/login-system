<?php
include './dbc.php';
session_start();
if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
    if (
        isset($_POST['name']) &&
        isset($_POST['age']) &&
        isset($_POST['gender']) &&
        isset($_POST['city']) &&
        isset($_POST['dob']) &&
        isset($_POST['contact'])
    ) {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $name = $conn->real_escape_string($_POST['name']);
        $age = $conn->real_escape_string($_POST['age']);
        $gender = $conn->real_escape_string($_POST['gender']);
        $city = $conn->real_escape_string($_POST['city']);
        $dob = $conn->real_escape_string($_POST['dob']);
        $contact = $conn->real_escape_string($_POST['contact']);
        $uid = $_SESSION['uid'];
        $dataUpdate = $conn->prepare(
            'UPDATE user_data SET name = ?,dob = ?,age = ?,gender=?,contact=?,city=? WHERE user_id = ?'
        );
        $uid = $_SESSION['uid'];
        $dataUpdate->bind_param(
            'ssisssi',
            $name,
            $dob,
            $age,
            $gender,
            $contact,
            $city,
            $uid
        );
        $dataUpdate->execute();
        $dataUpdate->close();
        echo json_encode(['statusCode' => 200]);
    }
} else {
    echo json_encode(['statusCode' => 204]);
    header('location: ../index.php');
    exit();
}
