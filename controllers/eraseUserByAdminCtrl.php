<?php
$clients = new users();
if(isset($_GET['id']))
{
    $clients->id = $_GET['id'];
    $clientInfo = $clients->clientInfo();
    $eraseClientData = $clients->eraseClientData();
}
?>

