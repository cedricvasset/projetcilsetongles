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
?>

