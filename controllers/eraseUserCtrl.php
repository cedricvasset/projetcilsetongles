<?php
 $clientUser = new users();
 $formError = array();
 $success = false;
if (isset($_POST['submitEraseUser']))
{
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
    if (count($formError) == 0)
    {
        $clientUser->id = $_SESSION['id'];
        $eraseClientData = $clientUser->eraseClientData();
        header('location: ../views/disconnectSession.php?action=disconnect');
        exit;
    }
}
?>

