<?php

$mail = '';
$password = '';
$formError = array();
$success = false;
if (isset($_POST['identSubmit']))
{
//    si le champs n'est pas vide
    if (!empty($_POST['userName']))
    {
//        on utilise la fonction filter_var et le filtre filter_validate_mail pour vérifier la forme du mail
        if (filter_var($_POST['userName'], FILTER_VALIDATE_EMAIL))
        {
//        on utilise htmlspecialchars pour modifier les caractères spéciaux éventuels avant d'insérer en base de données
            $mail = htmlspecialchars($_POST['userName']);
        }
        else
        {
//            si il y a une erreur on rempli le tableau formError pour l'affichage des erreurs sur le formulaire
            $formError['error'] = 'login ou mot de passe non valide!!!';
        }
    }
    else
    {
//        utilisation du meme message d'erreur pour ne pas donner d'indication à un éventuel hacker
        $formError['error'] = 'login ou mot de passe non valide!!!';
    }
    if (!empty($_POST['password']))
    {
        $password = htmlspecialchars($_POST['password']);
    }
    else
    {
        $formError['error'] = 'login ou mot de passe non valide!!!';
    }
    if (count($formError) == 0)
    {
//        on compte le nombre d'erreur du tableau
        $clientUser = new users();
        $clientUser->mail = $mail;
        if ($clientUser->userConnection())
        {
//            si les mots de passes correspondent,on attibut les valeurs aux variables de session
            if (password_verify($password, $clientUser->password))
            {
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
                header('location: ../views/alreadyRegister.php');
                exit;
            }
            else
            {
                $formError['error'] = 'login ou mot de passe non valide!!!';
            }
        }
    }
}
//si une session est démarée on lance la classe appointment et on attribut la valeur du $_SESSION['id']au champs id_a7b98_user
//évite les erreurs php avant l'ouverture de session
if (isset($_SESSION['isConnect']))
{
    $appointment = new appointment();
    $appointment->id_a7b98_users = $_SESSION['id'];
    if (isset($_GET['valid']))
    {
//    si on a appuyé sur le bouton,vérifié par les données passées en parametre d'url on lance la méthode
        $appointment->id = $_GET['id'];
        $appointmentValidateByAdmin = $appointment->appointmentValidateByAdmin();
    }
    if (isset($_GET['notValid']))
    {
        $appointment->id = $_GET['id'];
        $appointmentValidateByAdmin = $appointment->eraseAppointmentByAdmin();
    }
//méthode permettant de lire les données dans la base de données
    $clientListAppointment = $appointment->clientListAppointment();
}
?>

