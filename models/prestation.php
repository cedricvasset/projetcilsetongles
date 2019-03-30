<?php

class prestation extends dataBase {

    public $id = 0;
    public $prestation = '';
    public $price = 0;
    public $ID_a7b98_prestationsTypes = 0;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * recupère les données de la table prestationList
     * @return array
     */
    public function getPrestationList()
    {
//    on initialise un tableau vide
        $result = array();
        $query = 'SELECT `a7b98_prestationsList`.`id`, `a7b98_prestationsList`.`prestation`, `a7b98_prestationsList`.`price`, `a7b98_prestationsList`.`id_a7b98_prestationsTypes`, `a7b98_prestationsList`.`id_a7b98_timingPrestation` FROM `a7b98_prestationsList`';
        $queryResult = $this->db->query($query);
        if (is_object($queryResult))
        {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
//        sinon on returne le tableau vide initialisé 
        return $result;
    }

    /**
     * récupère les prestations correspondant à un certain type
     * @return array
     */
    public function getPrestationListByType()
    {
//    on initialise un tableau vide
        $result = array();
        $query = 'SELECT `a7b98_prestationsList`.`id`, `a7b98_prestationsList`.`prestation`, `a7b98_prestationsList`.`price`, `a7b98_prestationsList`.`ID_a7b98_prestationsTypes`, `a7b98_prestationsList`.`id_a7b98_timingPrestation`, `a7b98_prestationsTypes`.`TYPE` FROM `a7b98_prestationsList` INNER JOIN `a7b98_prestationsTypes` ON `a7b98_prestationsTypes`.`ID`= `a7b98_prestationsList`.`ID_a7b98_prestationsTypes` WHERE `a7b98_prestationsList`.`ID_a7b98_prestationsTypes`= :id_a7b98_prestationsTypes';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id_a7b98_prestationsTypes', $this->ID_a7b98_prestationsTypes, PDO::PARAM_INT);
        if ($queryResult->execute())
        {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}
?>

