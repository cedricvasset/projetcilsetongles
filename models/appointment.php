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
 public function inputRequestAppointment()
    {
        $query = 'INSERT INTO `a7b98_appointments` (`date`, `id_a7b98_users`, `id_a7b98_statusAppointments`, `id_a7b98_prestationsList`) VALUES (:date, :id_a7b98_users, :id_a7b98_statusAppointments, :idPrestation)';
        $stmt = $this->db->prepare($query); //on prépare la requète
        $stmt->bindValue(':date', $this->date, PDO::PARAM_STR);
        $stmt->bindValue(':id_a7b98_users', $this->id_a7b98_users, PDO::PARAM_INT); 
        $stmt->bindValue(':id_a7b98_statusAppointments', $this->id_a7b98_statusAppointments, PDO::PARAM_INT);
        $stmt->bindValue(':idPrestation', $this->id_a7b98_prestationsList, PDO::PARAM_INT);
        return $stmt->execute(); //exécution de la requète
    }
    /**
     * selectionne toutes les infos d'un rendez-vous en fonction de l id client
     * @return array
     */
    public function clientListAppointment()
    {
        //    on initialise un tableau vide
        $result = array();
        $query = 'SELECT `a7b98_appointments`.`id`, DATE_FORMAT(`date`, \'%d-%m-%Y à %H h %i\') AS `date`, `a7b98_appointments`.`id_a7b98_users`, `a7b98_appointments`.`id_a7b98_statusAppointments`, `a7b98_appointments`.`id_a7b98_prestationsList` FROM `a7b98_appointments` WHERE `a7b98_appointments`.`id_a7b98_users`=:id_a7b98_users ORDER BY `date` ASC';
//        $query = 'SELECT `a7b98_appointments`.`id`, DATE_FORMAT(`date`, \'%d-%m-%Y à %H h %i\') AS `date`, `a7b98_appointments`.`id_a7b98_users`, `a7b98_appointments`.`id_a7b98_statusAppointments`, `a7b98_appointments`.`id_a7b98_prestationsList` FROM `a7b98_appointments` WHERE `a7b98_appointments`.`id_a7b98_users`=:id_a7b98_users ORDER BY `date` ASC';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id_a7b98_users', $this->id_a7b98_users, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
    public function checkFreeAppointment(){
        $result = false;
        $query = 'SELECT COUNT(*) AS `takenAppointment` FROM `a7b98_appointments` WHERE `date` = :date AND `id_a7b98_users` = :id_a7b98_users';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':date', $this->date, PDO::PARAM_STR);
        $queryResult->bindValue(':id_a7b98_users', $this->id_a7b98_users, PDO::PARAM_INT);
        if($queryResult->execute()){
            $result = $queryResult->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
     public function needValidateAppointments()
    {
        //    on initialise un tableau vide
        $result = array();
        $query = 'SELECT `a7b98_users`.`id`,`a7b98_appointments`.`id`, DATE_FORMAT(`date`, \'%d-%m-%Y à %H h %i\') AS `date`, `a7b98_users`.`lastname`, `a7b98_users`.`firstname` FROM `a7b98_users` INNER JOIN `a7b98_appointments` ON `a7b98_appointments`.`id_a7b98_users` = `a7b98_users`.`id` WHERE `a7b98_appointments`.`id_a7b98_statusAppointments`=3 ORDER BY `date` ASC';
//        $query = 'SELECT `a7b98_appointments`.`id`, DATE_FORMAT(`date`, \'%d-%m-%Y à %H h %i\') AS `date`, `a7b98_appointments`.`id_a7b98_users`, `a7b98_appointments`.`id_a7b98_statusAppointments`, `a7b98_appointments`.`id_a7b98_prestationsList` FROM `a7b98_appointments` WHERE `a7b98_appointments`.`id_a7b98_statusAppointments`=3 ORDER BY `date` ASC';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id_a7b98_users', $this->id_a7b98_users, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
     public function appointmentValidateByAdmin()
    {
        $query = 'UPDATE `a7b98_appointments` SET `id_a7b98_statusAppointments`= 1 WHERE `id`= :id';
        $stmt = $this->db->prepare($query); //on prépare la requète
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute(); //exécution de la requète   
    }
     public function eraseAppointmentByAdmin()
    {
        $result = array();
        $query = 'DELETE FROM `a7b98_appointments` WHERE `id` = :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();   
    }
    public function __destruct()
    {
        parent::__destruct();
    }
}
?>

