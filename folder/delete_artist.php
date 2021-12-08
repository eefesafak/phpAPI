<?php

header('Content-Type: application/json');
require_once 'connection.php';

$response = array();


//provide artist id

if (isset($_POST['id'])) {
    //move on and delete the artist
    $id = $_POST['id'];
    $stmt = $con->prepare("DELETE FROM artist WHERE id=? LIMIT 1");
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        //success
        $response['error'] = false;
        $response['message'] = "artist deleted successfully";
    } else {
        //failure
        $response['error'] = true;
        $response['message'] = "failed to remove artist";
    }
} else {
    //we can not delete the artist because we do not know which artist to delete
    $response['error'] = true;
    $response['message'] = "please provide the artist id";
}

echo json_encode($response);
