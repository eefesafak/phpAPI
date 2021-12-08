<?php

header('Content-Type: application/json');
require_once 'connection.php';

$response = array();
//get id
//what can be updated? status name gender 

if (
    isset($_POST['id']) && isset($_POST['status'])
    && isset($_POST['name'])
    && isset($_POST['gender'])
) {
    //move on and update artist
    $id = $_POST['id'];
    $status = $_POST['status'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];

    $stmt = $con->prepare("UPDATE artist SET status='$status',
                                             name='$name',
                                             gender='$gender'
                                             WHERE id='$id'");
    if ($stmt->execute()) {
        //success
        $response['error'] = false;
        $response['message'] = "Artist has been updated successfully";
    } else {
        //failure
        $response['error'] = true;
        $response['message'] = "Failed tu update artist!";
    }
} else {
    // we do not have info to update the artist
    $response['error'] = true;
    $response['message'] = "Please provide us with id, status, name and gender";
}

echo json_encode($response);
