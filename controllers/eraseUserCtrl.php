<?php

$clientUser = new users();
$formError = array();
$success = false;
if (isset($_POST['submitEraseUser']))
{
//    on vérifi que le mot de passe saisi correspond une fois crypté au meme mot de passe que celui de la variable de session
    if (!empty($_POST['password']) && password_verify($_POST['password'], $_SESSION['password']))
    {
        $password = $_POST['password'];
    }
    else
    {
        $formError['password'] = 'mot de passe non valide ou vide!';
    }
    if (!empty($_POST['confirmPassword']))
    {
        if ($_POST['confirmPassword'] != $_POST['password'])
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
    if (count($formError) == 0)
    {
//        si le tableau d'erreur contient 0 ligne
        $clientUser->id = $_SESSION['id'];
        $clientUser->id_a7b98_roles = 3;
//        on lance la méthode de supression des données clients le delete cascade mis en place dans la base de données permet de supprimer les rdv en meme temps
        $eraseClientData = $clientUser->updateClientRole();
        header('location: ../views/disconnectSession.php?action=disconnect');
        exit;
    }
}
?>

