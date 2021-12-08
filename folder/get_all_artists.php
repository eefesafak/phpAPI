<?php
header('Content-Type: application/json');
require_once 'connection.php';

$response = array();
//mysql statement/query
$stmt = $con->prepare("SELECT * FROM artist");

if($stmt->execute()){
    //statement was executed successfully

    //this array stores all of the results
    $artist = array();
    //get all results from database
    $result = $stmt->get_result();

    //loop and get each single row
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $artist[] = $row;
    }

    $response['error'] = false; //this is no error
    $response['artist'] = $artist;
    $response['message'] = "artists returned successfully";
    $stmt->close();
    
}else{
    //we have an error
    $response['error'] = true;
    $response['message'] = "could not execute query";

}

//display the results
echo json_encode($response);

?>