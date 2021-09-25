<?php
include './dbc.php';
session_start();
if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
    header('location: ../index.php');
    exit();
} else {
    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['pass']) &&
        isset($_POST['repass'])
    ) {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        if ($_POST['pass'] != $_POST['repass']) {
            echo json_encode(['statusCode' => 201]);
            exit();
        } else {
            $pass = $conn->real_escape_string($_POST['pass']);
            $newpass = password_hash($pass, PASSWORD_BCRYPT);
        }
        $stmt = $conn->prepare('SELECT * FROM acc_info WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $num_rows = $result->num_rows;
        $stmt->close();
        if ($num_rows > 0) {
            echo json_encode(['statusCode' => 202]);
            exit();
        } else {
            $stmt = $conn->prepare(
                'INSERT INTO `acc_info`(`email`, `password`) VALUES (?,?)'
            );
            $stmt->bind_param('ss', $email, $newpass);
            $stmt->execute();
            $uidq = $conn->prepare('SELECT u_id FROM acc_info WHERE email = ?');
            $uidq->bind_param('s', $email);
            $uidq->execute();
            $ruid = $uidq->get_result()->fetch_assoc();
            $uidq->close();
            $uid = $ruid['u_id'];
            $stmt->close();
            $userd = $conn->prepare(
                'INSERT INTO `user_data`(`user_id`, `name`) VALUES (?,?)'
            );
            $userd->bind_param('is', $uid, $name);
            $userd->execute();
            $userd->close();
            $_SESSION['uid'] = $uid;
            echo json_encode(['statusCode' => 200]);
            $conn->close();
            exit();
        }
    } else {
        echo json_encode(['statusCode' => 203]);
    }
}
