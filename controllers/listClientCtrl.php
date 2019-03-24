<?php

if (isset($_POST['searchAjax']))
{
    include '../models/dataBase.php';
    include '../models/clientUser.php';
    $clients = new users();
    $_POST['searchAjax'] = htmlspecialchars($_POST['searchAjax']); //pour sécuriser le formulaire contre les failles html
    $clients->inputValue = $_POST['searchAjax'];
    $searchClientLastname = $clients->searchClientInfo();
    echo json_encode($searchClientLastname);
}
else{
    $clients = new users();
//    nombre de ligne affichées par page
    $limit = 8;
//    lancement de la méthode servant à compter le nombre total de client de la base de donnée
    $numberOfClients = $clients->countNumberClients();
//    on récupère le resultat arrondi du nombre de client que l'on divise par la limite
    $nbrPage = ceil($numberOfClients->numberClients / $limit);
    if (!empty($_GET['page']))
    {
        if (!is_numeric($_GET['page']) || $_GET['page'] > $nbrPage || $_GET['page'] <= 0 || !is_int(intval($_GET['page'])))
        {
            $page = 1;
        }else{
            $page = intval($_GET['page']);
        }
    }else{
        $page = 1;
    }
//    offset permet de savoir a quel moment on reprend à la ligne
    $offset = ($page - 1) * $limit;
    $getListByLimit = $clients->getListByLimit($limit, $offset);

//dans $clientUsers on va chercher la méthode
    if (isset($_GET['searchSubmit']))
    {
        $_GET['word'] = htmlspecialchars($_GET['word']); //pour sécuriser le formulaire contre les failles html
        $word = $_GET['word'];
        $clients->inputValue = $_GET['word'];
        $searchClientInfo = $clients->searchClientInfo();
    }
    $clientsList = $clients->getClientList();
}
$clients = new users;
$searchClientInfos = $clients->getClientList();
?>
