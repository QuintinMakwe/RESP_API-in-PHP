<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: applicaton/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/connectDB.php';
include_once '../../model/userInformation.php';

// //instantiate userInformation object
$user = new UserInformation($connect);

// //get the posted data from php's temporary file storage
$data = json_decode(file_get_contents('php://input'));

$user->id = $data->id;

if ($user->delete()) {
    echo json_encode(
        array("message" => "Structure details deleted")
    );
} else {
    echo json_encode(
        array("message" => "Structure details NOT deleted")
    );
}
