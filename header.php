<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <title>Cils & Ongles</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" /> 
        <link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Noticia+Text" rel="stylesheet" /> 
        <link rel="stylesheet" href="/assets/css/style.css" />
    </head>
    <body>
        <header>
            <div id="header"><h1 class="">Cils & Ongles</h1>
                <p>bienvenue : <?= (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] . ' ' . $_SESSION['firstname'] : '' ?></p>
            </div>
            <nav id="navbar" class="navbar navbar-expand-lg navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" id="accueil" href="../../index.php">ACCUEIL <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="presentation" href="/views/presentation.php">PRESENTATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="presta" href="" >PRESTATIONS</a>
                            <div class="presta1">
                                <a class="nav-link" id="onglePresta" href="/views/prestations.php" >ONGLES</a>
                            </div>
                            <div class="presta2">
                                <a class="nav-link" id="cilPresta" href="/views/prestations.php" >CILS</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="galery" href="/views/galerie.php">GALERIE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="goldBook" href="/views/livre.php">LIVRE D'OR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="meeting" href="/views/appointmentView.php">PRENDRE RENDEZ-VOUS</a>
                        </li>
                        <!--si une session est ouverte, et que la valeur de id role==2(role utilisateur simple) alors on affiche:--> 
                        <?php
                        if (isset($_SESSION['isConnect']) && ($_SESSION['id_a7b98_roles'] == 2))
                        {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/views/alreadyRegister.php">Mon compte</a>
                            </li>
                            <li class="logout_login">
                                <a  href="/views/disconnectSession.php?action=disconnect"><img class="img-fluid" src="../assets/img/login1.png" title="se connecter" /> </a>
                            </li>
                            <!--si une session est ouverte, et que la valeur de id role==1(role Administrateur) alors on affiche:-->
                        <?php
                        }
                        elseif (isset($_SESSION['isConnect']) && ($_SESSION['id_a7b98_roles'] == 1))
                        {
                            ?>
                            <li class="nav-item">
                                <a class="admin nav-link" href="/views/clientListView.php">MENU ADMIN</a>
                            </li>
                            <li class="logout_login">
                                <a  href="/views/disconnectSession.php?action=disconnect"><img class="img-fluid" src="../assets/img/login1.png" title="se déconnecter" /> </a>
                            </li>
                            <!--sinon (si il n'y a pas de session ouverte) on affiche:-->
    <?php }
else
{
    ?>
                            <li class="nav-item">
                                <a class="nav-link" id="inscriptionLink" href="/views/newRegistration.php">INSCRIPTION</a>
                            </li>
                            <li class="logout_login">
                                <a href="/views/alreadyRegister.php"><img class="img-fluid" src="../assets/img/logout2.png" title="se connecter" /> </a>
                            </li>
<?php } ?>
                    </ul>
                </div>
            </nav>

        </header>
