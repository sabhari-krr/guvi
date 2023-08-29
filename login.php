<?php
require "config.php";
if(isset($_POST['log']))
{
$email = mysqli_real_escape_string($db,$_POST['email']);
	$pwd = mysqli_real_escape_string($db, $_POST['pwd']);

    if($email == NULL || $pwd == NULL)//Check for empty fields
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    else{
        
    $emquery = "SELECT email FROM users WHERE email='$email'";
    $check = mysqli_num_rows(mysqli_query($db, $emquery));
    if ($check == 0)//Check for existing users
    {
        $res = [
            'status' => 404,
            'message' => 'User not found, Create account!'
        ];
        echo json_encode($res);
        return;
    }
    else{

        $query = "SELECT * FROM users WHERE email = '$email' and pwd = '$pwd'";
        $query_run = mysqli_query($db, $query);
     $count = mysqli_num_rows($query_run);
        if($count==1)//Validating user
        {
            $res = [
                'status' => 200,
                'message' => 'Login Successfully'
            ];
            echo json_encode($res);
            return;
        }
        else//Validation failed case
        {
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
