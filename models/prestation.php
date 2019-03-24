<?php
class prestation extends dataBase {

    public $id = 0;
    public $prestation = '';
    public $price = 0;
    
    public function __construct()
    {
        parent::__construct();
    }
    public function getPrestationList()
    {
//    on initialise un tableau vide
        $result = array();
        $query = 'SELECT `a7b98_prestationsList`.`id`, `a7b98_prestationsList`.`prestation`, `a7b98_prestationsList`.`price`, `a7b98_prestationsList`.`id_a7b98_prestationsTypes`, `a7b98_prestationsList`.`id_a7b98_timingPrestation` FROM `a7b98_prestationsList`';
        $queryResult = $this->db->query($query);
        //$this rapel la classe patients
        if (is_object($queryResult))
        {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
//        sinon on returne le tableau vide initialisé 
        return $result;
    }
    
    public function __destruct()
    {
        parent::__destruct();
    }
}
?>

