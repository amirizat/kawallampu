<?php

require('phpMQTT/phpMQTT.php');

$server = 'maqiatto.com';     // change if necessary
$port = 1883;                     // change if necessary
$username = 'izatsofi@gmail.com';                   // set your username
$password = 'Pass_123';                   // set your password
$client_id = 'amir'; // make sure this is unique for connecting to sever - you could use uniqid()
$message;

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$data1 = $_POST['data1'];
	if (empty($data1)) {
		$data1="";
		echo "nothing";
	} else {
		//$message = $data1 + $data2;
		$message=$data1;
		echo "Lampu".$data1."\n";
	}
  }

if ($mqtt->connect(true, NULL, $username, $password)) {
		$mqtt->publish("izatsofi@gmail.com/lamp",$message, 0);
		$mqtt->close();
} else {
    echo "Time out!\n";
}
