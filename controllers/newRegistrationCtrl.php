<?php

$clientUser = new users(); //$clientUser devient une instance de l objet
$regexText = '/^[a-zéèàêâùïüëA-Z- \']+$/';
$regexDate = '/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/';
$regexPhone = ' /^0[1-9]([-. ]?[0-9]{2}){4}$/';
//initialisation d'un tableau formError
$formError = array();
$success = false;
//si il existe un POST du bouton submit
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
//        filter_var et filter_validate_mail permet de ne pas utiliser de regex et de vérifier la conformité du champs avec une fonction php (plus rapide)
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
    if (!empty($_POST['password']))
    {
        $password = $_POST['password'];
    }
    else
    {
        $formError['password'] = 'Veuillez rentrer un mot de passe';
    }
    if (!empty($_POST['confirmPassword']))
    {
        if ($_POST['confirmPassword'] != $password)
        {
            $formError['confirmPassword'] = 'les mots de passes ne correspondent pas';
        }
        else
        {
            $confirmPassword = $_POST['confirmPassword'];
        }
    }
    else
    {
        $formError['confirmPassword'] = 'Veuillez confirmer votre mot de passe';
    }
    if (!empty($_POST['cguCheck']))
    {
        if ($_POST['cguCheck'])
        {
            $cguCheck = $_POST['cguCheck'];
        }
    }
    else
    {
        $formError['cguCheck'] = 'vous devez accepter les Conditions Générales de Vente et d\'Utilisation pour vous inscrire';
    }
    if (count($formError) == 0)
    {
//        si il n'y a pas d'erreur dans le tableau ,on attribut les valeurs des posts aux objets
        $clientUser->lastname = $lastname;
        $clientUser->firstname = $firstname;
        $clientUser->birthdate = $birthdate;
        $clientUser->phone = $phone;
        $clientUser->mail = $mail;
        $clientUser->cgu = $cguCheck;
//        cryptage du password avant insertion en base de données
        $clientUser->password = password_hash($password, PASSWORD_BCRYPT);
//        le role est attribué à la valeur 2 par défaut(utilisateur simple)
        $clientUser->id_a7b98_roles = 2;
//        lancement de la méthode qui vérifie l existence d'un email avant insertion des données dans la table
        $checkIfMailExist = $clientUser->checkIfMailExist();
        if (intval($checkIfMailExist->existMail) === 1)
        {
//            si au compteur on obtient 1 ligne alors on envoi le message dans le tableau formError
            $formError['existMail'] = 'Ce mail est déja utilisé';
            $success = false;
        }
        elseif (intval($checkIfMailExist->existMail) === 0)
        {
//            sinon on lance la méthode
            if (!$clientUser->createUser())
            {
                $success = false;
                $formError['existMail'] = 'Une erreur s\'est produite';
            }
            else
            {
//                attribution des valeurs aux variables de session
                $success = true;
                $_SESSION['id'] = $clientUser->id;
                $_SESSION['firstname'] = $clientUser->firstname;
                $_SESSION['lastname'] = $clientUser->lastname;
                $_SESSION['birthdate'] = $clientUser->birthdate;
                $_SESSION['mail'] = $clientUser->mail;
                $_SESSION['phone'] = $clientUser->phone;
                $_SESSION['creationDate'] = $clientUser->creationDate;
                $_SESSION['password'] = $clientUser->password;
                $_SESSION['cgu'] = $clientUser->cgu;
                $_SESSION['id_a7b98_roles'] = $clientUser->id_a7b98_roles;
                $_SESSION['isConnect'] = true;
            }
        }
        else
        {
            $success = false;
            $formError['existMail'] = 'Merci de contacter le service technique!';
        }
    }
}
?>

