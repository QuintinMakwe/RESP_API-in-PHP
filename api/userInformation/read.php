<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: applicaton/json');

include_once '../../config/connectDB.php';
include_once '../../model/userInformation.php';

// //instantiate userInformation object
$userInfo = new UserInformation($connect);

//Get request to db
$result = $userInfo->read();
$frontEndOutput = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $item = array(
            "id" => $row['id'],
            "structureName" => $row['structureName'],
            "structureOwner" => $row['structureOwner'],
        );

        array_push($frontEndOutput, $item);

    }
} else {
    echo "There are no results ";
}

echo json_encode($frontEndOutput);
