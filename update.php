<?php
require "config.php";
//Inserting into database
session_start();
$id = $_SESSION['loggeduserid'];
if (isset($_POST['save_reg'])) {
    $sql = "SELECT * FROM users WHERE id ='$id';";

    $updateFields = array();
    if (!empty($_POST['name'])) {
        $updateFields[] = "name='" . $_POST['name'] . "'";
    }
    if (!empty($_POST['dob'])) {
        $updateFields[] = "dob='" . $_POST['dob'] . "'";
    }
    if (!empty($_POST['mobile'])) {
        $updateFields[] = "mobile='" . $_POST['mobile'] . "'";
    }
    if (!empty($_POST['city'])) {
        $updateFields[] = "city='" . $_POST['city'] . "'";
    }
    if (!empty($_POST['state'])) {
        $updateFields[] = "state='" . $_POST['state'] . "'";
    }
    if (!empty($_POST['zip'])) {
        $updateFields[] = "zip='" . $_POST['zip'] . "'";
    }
    if (!empty($_FILES['profilepic']['name'])) {
        $s = $id;

        $file_name = $_FILES['profilepic']['name'];
        $file_tmp = $_FILES['profilepic']['tmp_name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_name = $s . "." . $ext;
        $filePath = "images/profile/" . $file_name;

        $oldImageFilePath = "images/profile/" . $s . ".*"; // Pattern to match old image
        $oldImageFiles = glob($oldImageFilePath);
        foreach ($oldImageFiles as $oldImage) {
            unlink($oldImage);
        }

        $query = "UPDATE users SET profilepic = '$filePath' WHERE id = '$id'";
        $run = mysqli_query($db, $query);

        if ($run) {
            move_uploaded_file($file_tmp, "images/profile/" . $file_name);
            $updateFields[] = "profilepic='" . $filePath . "'";
        }
    }
    // $res = 700;
    // echo json_encode($res);
    // return;
    if (!empty($updateFields)) {
        $updateFieldsStr = implode(', ', $updateFields);
        $query = "UPDATE users SET $updateFieldsStr WHERE id='$id';";
        $result = mysqli_query($db, $query);

        if ($result) {
            $res = [
                'status' => 200,
                'message' => 'Updated Successfully'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Details Not updated, Give relevant input'
            ];
            echo json_encode($res);
            return;
        }
    } else {
        $res = [
            'status' => 404,
            'message' => 'No fields to update'
        ];
        echo json_encode($res);
        return;
    }
}
