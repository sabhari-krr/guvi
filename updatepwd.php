<?php
require "config.php";
//Inserting into database
session_start();
//To update password
if (isset($_POST['fpwd'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
    $newpwd = mysqli_real_escape_string($db, $_POST['newpwd']);
    $sql = "SELECT * FROM users WHERE email ='$email';";
    $usercheck_run = mysqli_query($db, $sql);
    $count = mysqli_num_rows($usercheck_run);
    if (empty($email) || empty($mobile) || empty($newpwd)) {
        $res = [
            'status' => 404,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    if ($count == 0) {
        $res = [
            'status' => 400,
            'message' => 'User not exist'
        ];
        echo json_encode($res);
        return;
    }
    if ($count > 0) {
        $check = "SELECT * FROM users WHERE email ='$email';";
        $run = mysqli_query($db, $check);
        $val = mysqli_fetch_assoc($run);
        $tableemail = $val['email'];
        $tablemobile = $val['mobile'];
        if (($email == $tableemail) && ($mobile == $tablemobile)) {
            $query = "UPDATE users SET pwd='$newpwd' WHERE email='$email' AND mobile='$mobile';";
            $query_run = mysqli_query($db, $query);

            if ($query_run) {
                $res = [
                    'status' => 200,
                    'message' => 'Updated Successfully'
                ];
                echo json_encode($res);
                return;
            }
        } else {
            $res = [

                'status' => 500,
                'message' => 'Details Mismatching'
            ];
            echo json_encode($res);
            return;
        }
    }
}
