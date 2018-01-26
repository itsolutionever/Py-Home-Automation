<?php
include('include/DB_Functions.php');
////////////////////////////////////////////////////////////////////////////////////////////
//	Handle Data Recive From Android
///////////////////////////////////////////////////////////////////////////////////////////

// json response array
$response = array("error" => FALSE);
if (isset($_POST['email']) || isset($_POST['msg']) || isset($_POST['host'])) {

    // receiving the post params
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $host = $_POST['host'];




			////////////////////////////////////////////////////////////////////////////////////////////////
			//	Fatch Details Of User
			///////////////////////////////////////////////////////////////////////////////////////////////
			$array = fatch_host($email);
			$local_host = $array[0];
			$global_host = $array[1];

			if($host == 'local'){

				$host = $local_host;

			}
			else if($host == 'global'){

				$host = $global_host;

			}

			//////////////////////////////////////////////////////////////////////////////////////////////
			//	Send Data To Registered User
			/////////////////////////////////////////////////////////////////////////////////////////////




			$output=$msg;

			



    // check if server get msg or not
    
        if (android_pi($host,$output))
        {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in sending message!";
            echo json_encode($response);
        }
        else
        {
            // user stored successfully
            $response["error"] = FALSE;
            $response["error_msg"] = "Message send successfully!";
            echo json_encode($response);
        }
    
} 
else
{
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, email or password) is missing!";
    echo json_encode($response);
}
?>