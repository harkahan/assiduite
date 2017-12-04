<?php

// Classe generale de definition d'exception
class MonException extends Exception{
  private $chaine;
  public function __construct($chaine){
    $this->chaine=$chaine;
  }

  public function afficher(){
    return $this->chaine;
  }

}


// Exception relative à un probleme de connexion
class ConnexionException extends MonException{
}

// Exception relative à un probleme d'accès à une table
class TableAccesException extends MonException{
}

   /**
   *classe qui permet d'utiliser et de naviguer à travers l'interface de scodoc
   */
  class BdAuthentification{

    private $connexion;

    // Constructeur de la classe
    public function __construct(){
        try{
            $chaine="mysql:host=localhost;dbname= info2-2016-prs";
            $this->connexion = new PDO($chaine,"info2-2016-prs","sidiprs");
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           }
          catch(PDOException $e){
            $exception=new TableAccesException("problème de connexion à la base");
          }
        }

    /* Fonction qui permet l'authentification à travers l'interface de scodoc
    * precondition: username et password sont une authentification de scodoc
    * postcondition: retourne l'url retourné par scodoc
    */
    public function deconnexion(){
		$this->connexion=null;
	}


  //verifie si les identifiants sont valides
	public function verifieConnexion($login, $mdp){
		try{
			$statement = $this->connexion->prepare("SELECT mdp from Professeur where login= ?");//requete
			$statement->bindParam(1, $login);
			$statement->execute();
			$result=$statement->fetch(PDO::FETCH_ASSOC);

			if ($result["mdp"]!=NUll){
        // si il y a une valeur récupérée de la base de donnée
				return ( $mdp == $result["mdp"] ); // return true si les deux correspondent
			}else{
				return false;
			}
		}catch(PDOException $e){
			$this->deconnexion();
			throw new TableAccesException("problème avec la table Professeur");
		}
	}

  // return les modules possibles pour le professeurs
  public function departementPossible($login){
    try{
      $statement1 = $this->connexion->prepare("SELECT `le_departement` FROM `AppartientA` WHERE   le_professeur=?");
      $statement1-> bindParam(1, $login);
      $statement1-> execute();
			$result=$statement1->fetchall(PDO::FETCH_ASSOC);

      return $result;

		}catch(PDOException $e){
			$this->deconnexion();
			throw new TableAccesException("problème avec la table Professeur");
		}
  }
}


 ?>
