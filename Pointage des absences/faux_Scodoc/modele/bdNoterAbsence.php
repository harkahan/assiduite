<?php
   /**
   *classe qui permet d'utiliser et de naviguer à travers l'interface de scodoc
   * récupérer nom et prénom
   */
  class bdNoterAbsence{

    private $connexion;

    // Constructeur de la classe
    public function __construct(){
        try{
            $chaine="mysql:host=localhost;dbname= info2-2016-prs";
            $this->connexion = new PDO($chaine,"info2-2016-prs","sidiprs");
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           }
          catch(PDOException $e){
            $exception=new ConnexionException("problème de connexion à la base");
            throw $exception;
          }
        }

    /* Fonction qui permet l'authentification à travers l'interface de scodoc
    * precondition: username et password sont une authentification de scodoc
    * postcondition: retourne l'url retourné par scodoc
    */
    public function deconnexion(){
		$this->connexion=null;
	}

// retourne le nom et le prenom du professeur identifié.
  public function recupNomPrenom($login){
    try{
   $statement=$this->connexion->prepare("SELECT nom , prenom from Professeur WHERE login= ?");
   $statement->bindParam(1,$login);
   $statement->execute();
   $result=$statement->fetch();
   return($result);
   }
   catch(PDOException $e){
       throw new TableAccesException("problème avec la table professeur");
     }
   }

   // retourne les groupes possibles
   public function modulesPossibles($login) {
     $statement=$this->connexion->prepare("SELECT nom_module from Module WHERE enseignant=? ");
     $statement->bindParam(1,$login);
     $statement->execute();
     $result=$statement->fetchAll(PDO::FETCH_ASSOC);
     return $result;
   }

   // retourne les groupes possibles
   public function groupesPossibles($departement) {
     $statement=$this->connexion->prepare("SELECT id_groupe from Groupe where Departement = ?");
     $statement->bindParam(1,$departement);
     $statement->execute();
     $result=$statement->fetchAll(PDO::FETCH_ASSOC);
     return $result;
   }

   // return le tableau de pointage des absences
   public function demanderTab($groupe) {
     $statement = $this->connexion->prepare("SELECT CONCAT(`nom`,' ', `prenom`) FROM `Etudiant` WHERE `groupe`=?");//requete
     $statement->bindParam(1, $groupe);
     $statement->execute();
     $result=$statement->fetchAll(PDO::FETCH_ASSOC);

     // print_r ($result); // format : [nom] => [le_nom], [prenom] => [le_prenom]

     return $result;

   }
// retourne les absences notés du groupe
   public function demanderAbsence($groupe){

     $statement = $this->connexion->prepare("SELECT CONCAT(e1.nom,' ', e1.prenom,' ',a1.date,' ',a1.creneau) FROM Etudiant e1 , Absence a1 WHERE e1.groupe=? and a1.idEtu=e1.id ");
     $statement->bindParam(1, $groupe);
     $statement->execute();
     $result=$statement->fetchAll(PDO::FETCH_ASSOC);
     //print_r ($result); // format : [nom] => [le_nom], [prenom] => [le_prenom]
     if (is_array($result)){
       return $result;
     }

     return 0;
   }
// note une absence ou pluieurs
   public function checkAbsence($post,$logProf){

       //echo "La valeur à split : ".$post." ";
       $tab = explode("_", $post);
       // on retire les index vides
       foreach ($tab as $k => $v) {
         if (empty($v)){
           unset($tab[$k]);
         }
         $trueTab = array_values($tab);

       }
       //print_r($trueTab);

       // On recupere le l'id de l'etudiant a partir de son nom et prenom
       $statement=$this->connexion->prepare("SELECT id from Etudiant WHERE nom=? and prenom=? ");
       //echo "\n le nom : ".$tab[1]." ; ";
       $statement->bindParam(1,$trueTab[2]);

       //echo "\n le prenom : ".$tab[2]." ; ";
       $statement->bindParam(2,$trueTab[3]);

       $statement->execute();
       //echo "réussite de l'identification";
       $idEtu=$statement->fetch(PDO::FETCH_COLUMN,1);
       // on le split pour recupérer les différents éléments et les ajouté à la table absence
       $statement1 = $this->connexion->prepare("INSERT INTO Absence VALUES (?,?,?,?,?)");//requete
       //echo "l'idEtu : $idEtu \n";
       $statement1->bindParam(1, $idEtu);
       //echo "logProf : ".$logProf;
       $statement1->bindParam(2, $logProf);
       $statement1->bindParam(3, $trueTab[0]);
       $statement1->bindParam(4, $trueTab[1]);
       $statement1->bindValue(5, 0);

       //echo "la date  : ".$trueTab[0];
       $statement1->execute();

 }

}



?>
