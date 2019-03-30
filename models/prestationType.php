<?php

class prestationType extends dataBase {

    public $ID = 0;
    public $TYPE = '';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * récupère le type de prestation et l'id
     * @return array
     */
    public function prestationTypeList()
    {
//    on initialise un tableau vide
        $result = array();
        $query = 'SELECT `a7b98_prestationsTypes`.`ID`, `a7b98_prestationsTypes`.`TYPE` FROM `a7b98_prestationsTypes`';
        $queryResult = $this->db->query($query);
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

