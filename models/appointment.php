<?php
class appointment extends dataBase {

    public $id = 0;
    public $date = '2000-01-01 00:00';
    public $id_a7b98_users = 0;
    public $id_a7b98_prestationsList = 0;
//    initialisé à 3 par défaut
    public $id_a7b98_statusAppointments = 3;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * méthode permettant d'insérer en base de données un nouveau rendez-vous
     * @return boleen
     */
    public function inputRequestAppointment()
    {
        $query = 'INSERT INTO `a7b98_appointments` (`date`, `id_a7b98_users`, `id_a7b98_statusAppointments`, `id_a7b98_prestationsList`) VALUES (:date, :id_a7b98_users, :id_a7b98_statusAppointments, :idPrestation)';
        $stmt = $this->db->prepare($query); //on prépare la requète
        $stmt->bindValue(':date', $this->date, PDO::PARAM_STR); //:date = marqueur nominatif
        $stmt->bindValue(':id_a7b98_users', $this->id_a7b98_users, PDO::PARAM_INT);
        $stmt->bindValue(':id_a7b98_statusAppointments', $this->id_a7b98_statusAppointments, PDO::PARAM_INT);
        $stmt->bindValue(':idPrestation', $this->id_a7b98_prestationsList, PDO::PARAM_INT);
        return $stmt->execute(); //exécution de la requète
    }

    /**
     * selectionne toutes les infos d'un rendez-vous en fonction de id_a7b98_users
     * @return array
     */
    public function clientListAppointment()
    {
        //    on initialise un tableau vide
        $result = array();
        $query = 'SELECT `a7b98_appointments`.`id`, DATE_FORMAT(`date`, \'%d-%m-%Y à %H h %i\') AS `date`, `a7b98_appointments`.`id_a7b98_users`, `a7b98_appointments`.`id_a7b98_statusAppointments`, `a7b98_appointments`.`id_a7b98_prestationsList`, `a7b98_prestationsList`.`prestation` FROM `a7b98_appointments` INNER JOIN `a7b98_prestationsList` ON `a7b98_appointments`.`id_a7b98_prestationsList` = `a7b98_prestationsList`.`id` WHERE `a7b98_appointments`.`id_a7b98_users`=:id_a7b98_users ORDER BY `date` ASC';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id_a7b98_users', $this->id_a7b98_users, PDO::PARAM_INT);
        $queryResult->execute();
        if ($queryResult->execute())
        {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * méthode qui permet de compter le nombre de résultat ou la date correspond à la date est identique
     * @return array
     */
    public function checkFreeAppointment()
    {
        $result = false;
        $query = 'SELECT COUNT(*) AS `takenAppointment` FROM `a7b98_appointments` WHERE `date` = :date AND `id_a7b98_users` = :id_a7b98_users';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':date', $this->date, PDO::PARAM_STR);
        $queryResult->bindValue(':id_a7b98_users', $this->id_a7b98_users, PDO::PARAM_INT);
        if ($queryResult->execute())
        {
            $result = $queryResult->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * affiche les données du rendez-vous dont le status est 3
     * @return array
     */
    public function needValidateAppointments()
    {
        //    on initialise un tableau vide
        $result = array();
        // select avec jointure permettant de récupérer en meme temps la prestation correspondante
        $query = 'SELECT `a7b98_users`.`id`,`a7b98_appointments`.`id`, DATE_FORMAT(`date`, \'%d-%m-%Y à %H h %i\') AS `date`, `a7b98_users`.`lastname`, `a7b98_users`.`firstname`, `a7b98_prestationsList`.`prestation` FROM `a7b98_users` INNER JOIN `a7b98_appointments` ON `a7b98_appointments`.`id_a7b98_users` = `a7b98_users`.`id` INNER JOIN `a7b98_prestationsList` ON `a7b98_appointments`.`id_a7b98_prestationsList` = `a7b98_prestationsList`.`id` WHERE `a7b98_appointments`.`id_a7b98_statusAppointments`=3 ORDER BY `date` ASC';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id_a7b98_users', $this->id_a7b98_users, PDO::PARAM_INT);
        $queryResult->execute();
        if ($queryResult->execute())
        {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * permet de changer le status d'un rendez-vous en le passant à 1 en fonction de l'id du rdv
     * @return boleen
     */
    public function appointmentValidateByAdmin()
    {
        $query = 'UPDATE `a7b98_appointments` SET `id_a7b98_statusAppointments`= 1 WHERE `id`= :id';
        $stmt = $this->db->prepare($query); //on prépare la requète
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT); //:id=marqueur nominatif
        return $stmt->execute(); //exécution de la requète   
    }

    /**
     * supprime le rdv correspondant à l'id
     * @return boleen
     */
    public function eraseAppointmentByAdmin()
    {
        $result = array();
        $query = 'DELETE FROM `a7b98_appointments` WHERE `id` = :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    /**
     * modifi le satu du rdv à 2 en fonction de l'id rdv
     * @return boleen
     */
    public function changeStatusAppointmentByAdmin()
    {
        $result = array();
        $query = 'UPDATE `a7b98_appointments` SET `id_a7b98_statusAppointments`= 2 WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    /**
     * modifi la date du rdv en fonction de l id rdv
     * @return boleen
     */
    public function updateAppointmentDAte()
    {
        $query = 'UPDATE `a7b98_appointments` SET `date`= :date, `id_a7b98_statusAppointments`= :id_a7b98_statusAppointments WHERE `id`= :id';
        $stmt = $this->db->prepare($query); //on prépare la requète
        $stmt->bindValue(':date', $this->date, PDO::PARAM_STR);
        $stmt->bindValue(':id_a7b98_statusAppointments', $this->id_a7b98_statusAppointments, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute(); //exécution de la requète   
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}
?>

