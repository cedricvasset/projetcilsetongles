<?php
//on recupere dans l'url action
if(isset($_GET['action'])){
//    on lance le destruct de la session
    session_destroy();
//    on redirige vers la page index.php
header('location: ../index.php');
exit;
}
?>
