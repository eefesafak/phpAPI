<?php

header('Content-Type: application/json');
require_once 'connection.php';

$response = array();

//id name gender status field

// id --> will be created by the database

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['status']) && isset($_POST['field'])) {
    //store parameters in variables
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $field = $_POST['field'];

    //we have all parameters
    $stmt = $con->prepare("INSERT INTO artist (id,name,gender,status,field)
                   VALUES(?,?,?,?,?)");
    $stmt->bind_param('issis', $id, $name, $gender, $status, $field);

    //execute query
    if ($stmt->execute()) {
        //success
        $response['error'] = false;
        $response['message'] = "artist inserted successfully.";

        $stmt->close();
    } else {
        //failure
        $response['error'] = true;
        $response['message'] = "failed to inserted to the database";
    }
} else {
    //we can not insert a artist that doesn't have all of this information
        $response['error']=true;
        $response['message']="please provide all parameters";


}
echo json_encode($response)
?>