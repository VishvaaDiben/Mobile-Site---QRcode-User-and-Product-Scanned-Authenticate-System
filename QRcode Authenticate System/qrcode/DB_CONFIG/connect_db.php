<?php

$db = mysqli_connect("localhost","root","","web3");
if($db->connect_error)
{
    $error = $db->connect_error;
}
$db->set_charset('utf8');
