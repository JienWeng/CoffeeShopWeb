<?php
session_start();

$response = ['loggedIn' => false];

if (isset($_SESSION['valid'])) {
    $response['loggedIn'] = true;
}

echo json_encode($response);
?>