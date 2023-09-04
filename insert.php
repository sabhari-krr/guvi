<?php
require "config.php";
//Inserting into database
if (isset($_POST['save_reg'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

    if ($name == NULL || $email == NULL || $pwd == NULL || $mobile == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    $query = "INSERT INTO users (email,name,pwd,mobile) VALUES('$email','$name','$pwd','$mobile');";
    $usercheck = "SELECT email FROM users WHERE email='$email';";
    $usercheckquery_run = mysqli_query($db, $usercheck);
    if (mysqli_num_rows($usercheckquery_run) == 0) {
        $query_run = mysqli_query($db, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Registered Successfully'
            ];
            echo json_encode($res);
            return;
        }
    } else {
        $res = [
            'status' => 500,
            'message' => 'Already registered'
        ];
        echo json_encode($res);
        return;
    }
}
