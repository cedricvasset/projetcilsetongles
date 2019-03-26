<?php
class appointment extends dataBase {

    public $id = 0;
    public $date = '2000-01-01 00:00';
    public $id_a7b98_users = 0;
    public $id_a7b98_prestationsList = 0;
//    initialisé à 2 par défaut
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
    public function clientListAppointment()
    {
        //    on initialise un tableau vide
        $result = array();
        $query = 'SELECT `a7b98_appointments`.`id`, `a7b98_appointments`.`date`, `a7b98_appointments`.`id_a7b98_users`, `a7b98_appointments`.`id_a7b98_statusAppointments`, `a7b98_appointments`.`id_a7b98_prestationsList` FROM `a7b98_appointments` WHERE `a7b98_appointments`.`id_a7b98_users`=:id_a7b98_users ORDER BY `date` ASC';
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
    public function __destruct()
    {
        parent::__destruct();
    }
}
?>

