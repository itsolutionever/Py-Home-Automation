<?php

/**
 * @author Vasu Ratanpara
 * @link http://vasuratanpara.github.io
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['mac']) && isset($_POST['local_ip']) && isset($_POST['global_ip']) && isset($_POST['email']) && isset($_POST['latitude']) && isset($_POST['longitude'])) {

    // receiving the post params
    $mac = $_POST['mac'];
    $local_ip = $_POST['local_ip'];
    $global_ip = $_POST['global_ip'];
    $email = $_POST['email'];
    $latitude = $_POST['latitude'];
    $longitude =$_POST['longitude'];

    // check if device is already existed with the same mac
    if ($db->isDeviceExisted($mac)) {
        // device already existed
        $response["error"] = TRUE;
        $response["error_msg"] = "Device already existed with " . $mac;
        echo json_encode($response); 
    } else {
        // create a new device
        $device = $db->storeDevice($mac, $local_ip, $global_ip,$email,$latitude,$longitude);
        if ($device) {
            // device stored successfully
            $response["error"] = FALSE;
            $response["device_unique_id"] = $device["device_unique_id"];
            $response["owner"] = $device["owner"];
            $response["device"]["mac"] = $device["mac"];
            $response["device"]["local_ip"] = $device["local_ip"];
            $response["device"]["global_ip"] = $device["global_ip"];
            $response["device"]["created_at"] = $device["created_at"];
            $response["device"]["updated_at"] = $device["updated_at"];
            $response["device"]["latitude"] = $device["latitude"];
            $response["device"]["longitude"] = $device["longitude"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (mac, local_ip,global_ip,latitude or longitude) is missing!";
    echo json_encode($response);
}
?>

