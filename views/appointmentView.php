<?php
session_start();
include('../header.php');
include ('../indexCtrl.php');
?>
<div id="appointmentRegistrationLink" class="form-group">
    <p>Pour prendre rendez-vous, vous devez préalablement être <a href="/views/registrationChoice.php">identifié</a> sur le site</p>
</div>

<form action="appointmentView.php" method="POST">
    <div id="siteRegistration" class="form-group">
        <div class="row appointmentForm">
            <div class="col-lg-4 custom-control custom-checkbox">
                <div class="col-lg-12">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked="">
                    <label class="custom-control-label" for="customCheck1">prestation 1</label>
                </div>
                <div class="col-lg-12">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" checked="">
                    <label class="custom-control-label" for="customCheck2">prestation 2</label>
                </div>
            </div>
            <div class="col-lg-5">
                <label for="exampleSelect1">DATES DISPONIBLES</label>
                <select class="form-control" id="exampleSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="exampleSelect1">HORAIRES DISPONIBLES</label>
                <select class="form-control" id="exampleSelect1">
                    <option>09:00</option>
                    <option>10:30</option>
                    <option>13:00</option>
                    <option>15:00</option>
                    <option>17:00</option>
                </select>
            </div>
        </div>
        <button type="submit" name="submit" class="btnValid btn-primary btn-lg justify-content-center">VALIDER CE RENDEZ-VOUS</button> 
    </div>

</form>


<?php include('../footer.php'); ?>