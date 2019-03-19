<?php
 $clientUser = new users();
 $formError = array();
 $success = false;
if (isset($_POST['submitEraseUser']))
{   
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
        $clientUser->id = $_SESSION['id'];
        $eraseClientData = $clientUser->eraseClientData();
        header('location: ../views/disconnectSession.php?action=disconnect');
        exit;
    }
}
?>

