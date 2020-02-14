<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: applicaton/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/connectDB.php';
include_once '../../model/userInformation.php';

// //instantiate userInformation object
$user = new UserInformation($connect);

// //get the posted data from php's temporary file storage
$data = json_decode(file_get_contents('php://input'));

$data->structureName = htmlspecialchars(strip_tags($data->structureName));
$data->structureOwner = htmlspecialchars(strip_tags($data->structureOwner));
$user->structureName = $data->structureName;
$user->structureOwner = $data->structureOwner;

if ($user->create()) {
    echo json_encode(
        array("message" => "Structure details saved")
    );
} else {
    echo json_encode(
        array("message" => "Structure details NOT saved")
    );
}
