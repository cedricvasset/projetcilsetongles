<?php
$success = false;
$clients = new users();
if (isset($_GET['idUserDelete']))
{
//     si on trouve idUserDelete dans les parmetres d'url
    $clients->id = $_GET['idUserDelete'];
    if ($clients->eraseClientData())
    {
//            on lance la méthode de suppression des données client
        $success = true;
    }
}
if (isset($_GET['id']))
{
//    si il y a un id dans les parametres d'url
    $clients->id = $_GET['id'];
//    on lance la méthode de lecture des infos client
    $clientInfo = $clients->clientInfo();
}
?>

