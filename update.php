<?php
require "config.php";
session_start();
//Inserting into database
$id = $_SESSION['loggeduserid'];
//TO update profile
if (isset($_POST['save_reg'])) {
    $sql = "SELECT * FROM users WHERE id ='$id';";

    $updateFields = array();
    if (!empty($_POST['name'])) {
        $updateFields[] = "name='" . $_POST['name'] . "'";
    }
    if (!empty($_POST['dob'])) {
        $updateFields[] = "dob='" . $_POST['dob'] . "'";
        $birthYear = new DateTime($_POST['dob']);
        $today = new DateTime();
        $age = $today->diff($birthYear)->y;

        $updateAgeQuery = "UPDATE users SET age = '$age' WHERE id = '$id';";
        mysqli_query($db, $updateAgeQuery);
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
//To update Social links
if (isset($_POST['linkclick'])) {
    $sql = "SELECT * FROM users WHERE id ='$id';";

    $updateFields = array();
    if (!empty($_POST['linkedin'])) {
        $updateFields[] = "linkedin='" . $_POST['linkedin'] . "'";
    }
    if (!empty($_POST['github'])) {
        $updateFields[] = "github='" . $_POST['github'] . "'";
    }
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
            'message' => 'No links to update'
        ];
        echo json_encode($res);
        return;
    }
}
