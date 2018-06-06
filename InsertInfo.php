<?php

include_once ('./db/connect_db.php');
$db = new connect_db();
if (isset($_POST['email']) && isset($_POST['firstName']) && (isset($_POST['lastName'])) && (isset($_POST['country'])) && (isset($_POST['phone']))) {
    $email = $_POST['email'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    echo "ok";
    $db->AddInfo($email, $firstname, $lastname, $country, $phone);
} else {
    echo "wrong";
}
