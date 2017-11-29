<?php

  /*Classe pour se connecter à la base de donnée et agir dessus*/
  class modele_gerer_bd{

    private $connexion;

    public function __construct(){
      try{
        $chaine="mysql:host=".HOST.";dbname=".BD;
        $this->connexion = new PDO($chaine,LOGIN,PASSWORD);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       }
       catch(PDOException $e){
         print($e->getMessage());
       }
    }

    public function getEtudiant($groupe){
      try{
          $stmt = $this->connexion->prepare('SELECT nom, prenom from Etudiant where groupe=?');
          $stmt->bindParam(1, $groupe);
          $stmt->execute();

          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $result;
      }
      catch(PDOException $e){
        print($e->getMessage());
      }
    }

  }
