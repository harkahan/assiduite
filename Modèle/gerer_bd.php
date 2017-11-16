<?php

  /*Classe pour se connecter à la base de donnée et agir dessus*/
  class authentification_bd{

    private $connexion;

    public function __construct(){
      try{
        $chaine="mysql:host=localhost;dbname=E164708F";
        $this->connexion = new PDO($chaine,"E164708F","E164708F");
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       }
       catch(PDOException $e){
         print($e->getMessage());
       }
    }

    public function verifieAuthentification($login, $mdp){
      try{
        if (isset($login) and isset($mdp)) {
          $stmt = $this->connexion->prepare('SELECT mdp from Professeur where login=?');
          $stmt->bindParam(1, $login);
          $stmt->execute();

          $tabRes = $stmt->fetch();
          if (isset($tabRes[0])) {
            if ($tabRes[0] == $mdp) {
              return true;
            }
          }

        }
        return false;
      }
      catch(PDOException $e){
        print($e->getMessage());
      }
    }

  }
