<?php
include './dbc.php';
session_start();
if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
    header('location: ../index.php');
    exit();
} else {
    if (isset($_POST['email']) && isset($_POST['pass'])) {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email = $conn->real_escape_string($_POST['email']);
        $pass = $conn->real_escape_string($_POST['pass']);

        $stmt1 = $conn->prepare('SELECT * FROM acc_info WHERE email = ?');
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $result = $stmt1->get_result();
        $num_rows = $result->num_rows;
        $stmt1->close();
        if ($num_rows > 0) {
            $stmt2 = $conn->prepare(
                'SELECT password FROM acc_info WHERE email = ?'
            );
            $stmt2->bind_param('s', $email);
            $stmt2->execute();
            $result = $stmt2->get_result()->fetch_assoc();
            $stmt2->close();
            if (password_verify($pass, $result['password'])) {
                $uidq = $conn->prepare(
                    'SELECT u_id FROM acc_info WHERE email = ?'
                );
                $uidq->bind_param('s', $email);
                $uidq->execute();
                $ruid = $uidq->get_result()->fetch_assoc();
                $uidq->close();
                $uid = $ruid['u_id'];
                $_SESSION['uid'] = $uid;
                echo json_encode(['statusCode' => 200]);
                exit();
            } else {
                echo json_encode(['statusCode' => 201]);
                exit();
            }
        } else {
            echo json_encode(['statusCode' => 202]);
            exit();
        }
    } else {
        echo json_encode(['statusCode' => 203]);
        exit();
    }
}
