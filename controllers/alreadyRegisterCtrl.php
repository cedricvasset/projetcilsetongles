<?php

$mail = '';
$password = '';
$formError = array();
$success = false;

if (isset($_POST['identSubmit']))
{
    if (!empty($_POST['userName']))
    {
        if (filter_var($_POST['userName'], FILTER_VALIDATE_EMAIL))
        {
            $mail = htmlspecialchars($_POST['userName']);
        }
        else
        {
            $formError['error'] = 'login ou mot de passe non valide!!!';
        }
    }
    else
    {
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
    $clientListAppointment = $appointment->clientListAppointment();
}
?>

