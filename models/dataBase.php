<?php

class dataBase {
    protected $db;

    public function __construct()
    {
        try {
            // On se connecte à MySQL
            $this->db = new PDO('mysql:ho...st=localhost;dbname=cilsetongles;charset=utf8;', 'cilsetongles', 'cilsetongles');
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function __destruct()
    {
        $db = NULL;
    }
}
?>

