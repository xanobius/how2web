<?php
$serv = "localhost";
$user = "how2web_user";
$pwd = "08mxnDbP@$$15";
$dbname = "how2web";

// Create connection
$conn = new mysqli($serv, $user, $pwd, $dbname);

// Just to be sure our umlauts won't be giberish
$conn->set_charset('utf8');

// Was it successfull? Die otherwise, we would have no data anyway
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    print "connection successful";
    // everything shiny, yay!
}
?>
