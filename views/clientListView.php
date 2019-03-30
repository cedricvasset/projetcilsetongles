<?php
session_start();
include'../header.php';
include '../models/clientUser.php';
include '../controllers/listClientCtrl.php';
include'administratorNavbar.php';
?>
<div class="search row col-lg-12 justify-content-center">
    <form class="form-inline my-2 my-lg-0" action="clientListView.php" method = "GET">
        <input id="search" name="word" class="form-control mr-sm-2" type="search" placeholder="NOM DU CLIENT ?" >
    </form>
</div>
<div class="row col-lg-12 listClientTab">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Age</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="searchResult">
            <?php
            foreach ($getListByLimit as $info)
            { //boucle d'affichage des informations dans le tableau
                ?>
                <tr class="table-secondary">
                    <td><?= $info->lastname ?></td>
                    <td><?= $info->firstname ?></td>
                    <td><?= $info->birthdate ?></td>
                    <td><?= $info->age ?></td>
                    <td><a class="btn btn-success btn-lg" href="clientInformationAndUpdateView.php?id=<?= $info->id ?>" >INFORMATIONS / MODIFICATIONS</a></td>
                    <td><a class="btn btn-info btn-lg" href="createAppointmentByAdmin.php?id=<?= $info->id ?>" >AJOUT RENDEZ-VOUS</a></td>
                    <td><a class="btn btn-danger btn-lg" href="eraseUserByAdmin.php?id=<?= $info->id ?>" >SUPPRIMER</a></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>
<div class="row col-lg-12 paginationCursor">
    <ul class="pagination pagination-lg">
        <!--si je suis sur la page 1 je rajoute une class disabled-->
        <li class="page-item <?= $page == 1 ? 'enabled' : '' ?>">
            <a class="page-link" href="clientListView.php?page=<?= $page - 1 ?>">&laquo;</a>
        </li>
        <?php
        for ($page = 1; $page <= $nbrPage; $page++)
        {
            ?>
            <li class="page-item">
                <a class="page-link" href="clientListView.php?page=<?= $page ?>"><?= $page ?></a>
            </li>
        <?php } ?>
        <li class="page-item <?= $page == $nbrPage ? 'enabled' : '' ?>">
            <a class="page-link" href="clientListView.php?page=<?= $page + 1 ?>">&raquo;</a>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>