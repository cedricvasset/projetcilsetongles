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

else
{
    $clients = new users();
    $limit = 8;
    $numberOfClients = $clients->countNumberClients();
    $nbrPage = ceil($numberOfClients->numberClients / $limit);
//    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    if (!empty($_GET['page']))
    {
        if(!is_numeric($_GET['page']) || $_GET['page'] > $nbrPage || $_GET['page'] <= 0 || !is_int(intval($_GET['page'])))
        {
            $page = 1;
        }
        else
        {
            $page = intval($_GET['page']);
        }
    }
    else
    {
        $page = 1;
    }
    $offset = ($page - 1) * $limit;
    $getListByLimit = $clients->getListByLimit($limit, $offset);
//dans $patients on va chercher la méthode
  
    if (isset($_GET['searchSubmit']))
    {
        $_GET['word'] = htmlspecialchars($_GET['word']); //pour sécuriser le formulaire contre les failles html
        $word = $_GET['word'];
        $clients->inputValue = $_GET['word'];
        $searchClientInfo = $clients->searchClientInfo();
    }
//    $numberPatients = $patients->countNumberPatients();
//  
//    
////    $nbrPatients = $patients->numberPatients;
//    
//    
//    
//
    $clientsList = $clients->getClientList();
}

$clients = new users;
$searchClientInfos = $clients->getClientList();
?>
