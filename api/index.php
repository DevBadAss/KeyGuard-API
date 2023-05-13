<?php

require_once './includes/KeyGuard.php';

// Set response headers to allow CORS
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: POST');

// Get Request method
$request_method = $_SERVER['REQUEST_METHOD'];

// Creating KeyGuard API instance
$KeyGuard = new KeyGuard();

$data = json_decode(file_get_contents("php://input"));

if ($request_method == 'POST') {
    
    if ($data->action === "hash") {
        $hash = $KeyGuard->getHash($data->value);
        echo json_encode(array("hash" => $hash));
    }

    if ($data->action == "verify") {
        $hash = $KeyGuard->verifyHash($data->value, $data->hash);
        if ($hash) {
            echo json_encode(array("status" => "Verified"));
        }else{
            echo json_encode(array("status" => "Not Verified"));
        }
    }
}else{
    http_response_code(405);
    echo json_encode(array("Error"=>"Method not Allowed"));
}
?>