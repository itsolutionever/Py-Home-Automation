<?php

/**
 * @author Vasu Ratanpara
 * @link http://vasuratanpara.github.io
 */

class DB_Functions {

    private $conn;

    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $password) {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt

        $stmt = $this->conn->prepare("INSERT INTO users(unique_id, name, email, encrypted_password, salt, created_at) VALUES(?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssss", $uuid, $name, $email, $encrypted_password, $salt);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function storeDevice($mac, $local_ip, $global_ip, $email, $latitude,$longitude) {
        $uuid = uniqid('', true);

        $stmt = $this->conn->prepare("INSERT INTO devices(owner,device_unique_id, mac, local_ip, global_ip, latitude, longitude,  created_at) VALUES(?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssssss", $email, $uuid, $mac, $local_ip, $global_ip, $latitude, $longitude);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM devices WHERE mac = ?");
            $stmt->bind_param("s", $mac);
            $stmt->execute();
            $device = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $device;
        } else {
            return false;
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");

        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $stmt = $this->conn->prepare("SELECT email from users WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed 
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function isDeviceExisted($mac) {
        $stmt = $this->conn->prepare("SELECT mac from devices WHERE mac = ?");

        $stmt->bind_param("s", $mac);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed 
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

}


///////////////////////////////////////////////////////////////////////


function android_pi($host, $output) {

$port = 1998;
$socket = socket_create(AF_INET, SOCK_STREAM,0) or die("Could not create socket\n"); //or return (FALSE);

socket_connect ($socket , $host,$port ) ;

socket_write($socket, $output, strlen ($output)) or die("Could not write output\n"); // or return (FALSE);

socket_close($socket) ;

//return TRUE;

}

function fatch_host($email) {

    $conn;
    require_once 'DB_Connect.php';
    // connecting to database
    $db = new Db_Connect();
    $conn = $db->connect();

    $result = mysqli_query($conn,"SELECT local_ip, global_ip from devices WHERE owner ='$email'");

        if ($row = mysqli_fetch_array($result)) {
            $local_host = $row['local_ip'];
            $global_host = $row['global_ip'];
            
            return array($local_host,$global_host);
        } else {
            // user not existed
            $stmt->close();
            return false;
        }

}

?>
