<?php
session_start();
include '../header.php';
include '../models/appointment.php';
include '../models/prestation.php';
include '../controllers/prestationsCtrl.php';
?>
<div class="row">
    <div class="col-lg-6 prestation col-sm-12 align-items-center load-from-left">
        <h3><?= $prestationList[0]->TYPE ?></h3>
        <?php
        foreach ($prestationList as $list)
        { //affichage des prestations et du tarif grace à une boucle
            ?>
            <p><?= $list->prestation ?></p>
            <p><?= $list->price ?> €</p>
        <?php } ?>
    </div>
    <?php
    if ($prestation->ID_a7b98_prestationsTypes == 1)
    {
        ?>
        <div class="col-lg-5 prestation load-from-right">
            <img class="galeryImg img-fluid" src="../assets/img/imgGalerie/ongle1(14x10).jpg"/>
            <img class="galeryImg img-fluid" src="../assets/img/imgGalerie/ongle2(14x10).jpg"/>
            <img class="galeryImg img-fluid" src="../assets/img/imgGalerie/ongle3(14x10).jpg"/>
            <img class="galeryImg img-fluid" src="../assets/img/imgGalerie/ongle4(14x10).jpg"/>
        </div>
        <?php
    }
    else
    {
        ?>
        <div class="col-lg-5 prestation load-from-right">
            <img class="galeryImg img-fluid" src="../assets/img/imgGalerie/cils1(14x10).jpg"/>
            <img class="galeryImg img-fluid" src="../assets/img/imgGalerie/cils2(14x10).png"/>
            <img class="galeryImg img-fluid" src="../assets/img/imgGalerie/cils4(14x10).jpg"/>
            <img class="galeryImg img-fluid" src="../assets/img/imgGalerie/cils5(14x10).jpg"/>
        </div>
    <?php } ?>
</div>
</div>
<?php include '../footer.php'; ?>

