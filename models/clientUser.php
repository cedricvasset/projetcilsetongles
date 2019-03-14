<?php

class users extends dataBase {

    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '2000-01-01';
    public $phone = '';
    public $mail = '';
    public $creationDate = '2000-01-01';
    public $password = '';
    public $cgu = 1;

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * cette méthode sert a insérer les données dans la table a7b98_users
     * @return array
     */
    public function createUser()
    {
        $caracSuppr = array('-', ' ', '.');
        $query = 'INSERT INTO `a7b98_users` (`firstname`, `lastname`, `birthdate`, `mail`, `phone`, `creationDate`, `password`, `cgu`, `id_a7b98_roles`) VALUES (:firstname, UPPER(:lastname), :birthdate, :mail, :phone, DATE( NOW()), :password, :cgu, :id_a7b98_roles)';
        $stmt = $this->db->prepare($query); //on prépare la requète
        $stmt->bindValue(':firstname', ucfirst(strtolower($this->firstname)), PDO::PARAM_STR); //transformation de la premiere lettre en majuscule
        $stmt->bindValue(':lastname', $this->lastname, PDO::PARAM_STR); // :lastname=marqueur nominatif
        $stmt->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $stmt->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $stmt->bindValue(':phone', str_replace($caracSuppr, '', $this->phone), PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
        $stmt->bindValue(':cgu', $this->cgu, PDO::PARAM_INT);
        return $stmt->execute(); //exécution de la requète
    }
    /**
     * cette méthode sert a compter le nombre d'email identiques a7b98_users
     * @return array
     */
    public function checkIfMailExist()
    {
        $result = false;
        $query = 'SELECT COUNT(*) AS `existMail` FROM `a7b98_users` WHERE `mail` = :mail';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if ($queryResult->execute())
        {
            $result = $queryResult->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
/**
 * cette méthode permet de recuperer les données de la table en fonction du mail(identifiant)
 * @return array
 */
    public function userConnection()
    {
        $state = false;
        $query = 'SELECT `a7b98_users`.`id`, `a7b98_users`.`firstname`, `a7b98_users`.`lastname`, `a7b98_users`.`birthdate`, `a7b98_users`.`mail`, `a7b98_users`.`phone`, `a7b98_users`.`creationDate`, `a7b98_users`.`password`, `a7b98_users`.`cgu`, `a7b98_users`.`id_a7b98_roles` FROM  `a7b98_users` INNER JOIN `a7b98_roles` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if ($result->execute())
        {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            if (is_object($selectResult))
            { 
                $this->id = $selectResult->id;
                $this->firstname = $selectResult->firstname;
                $this->lastname = $selectResult->lastname;
                $this->birthdate = $selectResult->birthdate;
                $this->mail = $selectResult->mail;
                $this->phone = $selectResult->phone;
                $this->creationDate = $selectResult->creationDate;
                $this->password = $selectResult->password;
                $this->cgu = $selectResult->cgu;
                $this->id_a7b98_roles = $selectResult->id_a7b98_roles;
                $state = true;
            }
        }
        return $state;
    }
    public function __destruct()
    {
        parent::__destruct();
    }
}
?>
