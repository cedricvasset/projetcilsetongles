<?php
class appointment extends dataBase {

    public $id = 0;
    public $date = '2000-01-01';
    public $idClient = 0;
    public $idPrestation = 0;
    public function __construct()
    {
        parent::__construct();
    }
 public function inputRequestAppointment()
    {
        $query = 'INSERT INTO `a7b98_appointments` (`date`, `id_a7b98_users`, `id_a7b98_statusAppointments`, `id_a7b98_prestationsList`) VALUES (:date, :idClient, 2, :idPrestation)';
        $stmt = $this->db->prepare($query); //on prépare la requète
        $stmt->bindValue(':date', $this->date, PDO::PARAM_STR);
        $stmt->bindValue(':idClient', $this->idClient, PDO::PARAM_INT); 
        $stmt->bindValue(':idPrestation', $this->idPrestation, PDO::PARAM_INT);
        return $stmt->execute(); //exécution de la requète
    }
    public function __destruct()
    {
        parent::__destruct();
    }
}
?>

