<?php
include "config.php";
session_start();
if (isset($_POST['log'])) {
    login($_POST['email'], $_POST['pwd'], $db);
} elseif (isset($_POST['logout'])) {
    logout();
}
function login($email, $pwd, $db)
{
    $email = mysqli_real_escape_string($db, $email);
    $pwd = mysqli_real_escape_string($db, $pwd);

    if ($email == NULL || $pwd == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    } else {
        $emquery = "SELECT email FROM users WHERE email='$email'";
        $check = mysqli_num_rows(mysqli_query($db, $emquery));
        if ($check == 0) {
            $res = [
                'status' => 404,
                'message' => 'User not found, Create an account!'
            ];
            echo json_encode($res);
            return;
        } else {
            $query = "SELECT * FROM users WHERE email = '$email' AND pwd = '$pwd'";
            $query_run = mysqli_query($db, $query);
            $count = mysqli_num_rows($query_run);
            if ($count == 1) {
                $_SESSION['loggedin'] = TRUE;
                $idfetchquery = "SELECT id FROM users WHERE email='$email';";
                $id = mysqli_query($db, $idfetchquery);
                $user = mysqli_fetch_assoc($id);
                $_SESSION['loggeduserid'] = $user['id'];
                $res = [
                    'status' => 200,
                    'message' => 'Login Successfully'
                ];
                echo json_encode($res);
                return;
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Username/Password wrong'
                ];
                echo json_encode($res);
                return;
            }
        }
    }
}

function logout()
{
    if (isset($_SESSION['loggedin'])) {
        session_destroy();
        $res = [
            'status' => 200,
            'message' => 'Logged out successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        die('Logout code not executed');
    }
}
