<?php

$clients = new users();
if (isset($_GET['id']))
{
//    on récupère le get de l'id
    $clients->id = $_GET['id'];
//    on lance la méthode
    $clientInfo = $clients->clientInfo();
//    on modifi la forme de la date
    $formatedDate = date('Y-m-d', strtotime($clients->birthdate));
}
//stockage des regex dans des variables afin de les réutiliser si besoin sans avoir besoin de les réecrire
$regexText = '/^[a-zéèàêâùïüëA-Z- \']+$/';
$regexDate = '/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/';
$regexPhone = ' /^0[1-9]([-. ]?[0-9]{2}){4}$/';
$formError = array();
$success = false;
//si on valide le formulaire
if (isset($_POST['submit']))
{
//    si $_POST['firstname'] n'est pas vide
    if (!empty($_POST['firstname']))
    {
//        si la regex du $_POST['firstname'] est ok 
        if (preg_match($regexText, $_POST['firstname']))
        {
//          alors $firstname prend le contenu de $_POST['firstname']
            $firstname = htmlspecialchars($_POST['firstname']);
        }
        else
        {
//          si la regex n est pas ok alors on envoi dans le tableau $formError 'la string'
            $formError['firstname'] = 'Veuillez rentrer un prénom valide.'; //clé associative
        }
    }
    else
    {
//      si le post est vide alors on envoi dans le tableau $formError 'la string'
        $formError['firstname'] = 'Veuillez entrer votre prénom.';
    }
    if (!empty($_POST['lastname']))
    {
        if (preg_match($regexText, $_POST['lastname']))
        {
            $lastname = htmlspecialchars($_POST['lastname']);
        }
        else
        {
            $formError['lastname'] = 'Veuillez rentrer un nom valide.';
        }
    }
    else
    {
        $formError['lastname'] = 'Veuillez entrer votre nom.';
    }
    if (!empty($_POST['birthdate']))
    {
        if (preg_match($regexDate, $_POST['birthdate']))
        {
            $birthdate = htmlspecialchars($_POST['birthdate']);
        }
        else
        {
            $formError['birthdate'] = 'merci de saisir une date valide ';
        }
    }
    else
    {
        $formError['birthdate'] = 'Veuillez entrer une date de naissance';
    }
    if (!empty($_POST['mail']))
    {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
        {
            $mail = htmlspecialchars($_POST['mail']);
        }
        else
        {
            $formError['mail'] = 'Veuillez rentrer un Email valide.';
        }
    }
    else
    {
        $formError['mail'] = 'Veuillez entrer votre email.';
    }
    if (!empty($_POST['phone']))
    {
        if (preg_match($regexPhone, $_POST['phone']))
        {
            $phone = htmlspecialchars($_POST['phone']);
        }
        else
        {
            $formError['phone'] = 'Veuillez rentrer un téléphone valide.';
        }
    }
    else
    {
        $formError['phone'] = 'Veuillez entrer votre numéro de téléphone.';
    }
    if (count($formError) == 0)
    {
//        si il n'y a pas d'erreur stocké dans le tableau d'erreur,on attribut les valeurs aux variables
        $clients->lastname = $lastname;
        $clients->firstname = $firstname;
        $clients->birthdate = $birthdate;
        $clients->phone = $phone;
        $clients->mail = $mail;
        $clients->id = $_GET['id'];
//        roles initialisé à 2 ,correspond à un utilisateur client
        $clients->id_a7b98_roles = 2;
//        lancement de la méthode verifiant si le mail est déja utilisé
        $checkIfMailExist = $clients->checkIfMailExist();
        if (intval($checkIfMailExist->existMail) === 1)
        {
//            si au compteur on obtient 1 ligne alors on envoi le message dans le tableau formError
            $formError['existMail'] = 'Ce mail est déja utilisé et nous n\'avons pas pu modifier les informations!!!';
            $success = false;
        }
        elseif (intval($checkIfMailExist->existMail) === 0)
        {
//            si il n'y a pas d'erreur on lance la méthode d'insertion des données
            if (!$clients->updateClientInformation())
            {
                $success = false;
                $formError['existMail'] = 'Une erreur s\'est produite';
            }
            else
            {
                $success = true;
            }
        }
        else
        {
            $success = false;
            $formError['existMail'] = 'Merci de contacter le service technique!';
        }

        if ($clients->updateClientInformation())
        {
//            on attribut les nouvelles valeurs aux variables
            $clients->lastname = $lastname;
            $clients->firstname = $firstname;
            $clients->birthdate = $birthdate;
            $clients->phone = $phone;
            $clients->mail = $mail;
            $clients->id = $_GET['id'];
        }
    }
}
?>

