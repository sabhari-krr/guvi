<?php
session_start();
if (!isset($_SESSION['loggedin'])){
    session_destroy();
    $res = [
            'status' => 200,
            'message' => 'Logged out successfully'
        ];
        echo json_encode($res);
        return;
}
