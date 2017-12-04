<?php
   /**
   *classe qui permet d'utiliser et de naviguer à travers l'interface de scodoc
   */
  class mdl_bd{


    private $getDebugMessage;


    function __construct(){

      //mettre cette variable à true pour afficher les messages de DEBUG
  		$this->getDebugMessage=false;

    }


//______________________________________________________________________________
//______________________________________________________________________________



    /* role : Fonction qui permet l'authentification à travers l'interface de scodoc
     * precondition : username et password sont une authentification de scodoc
     * postcondition : retourne l'url retourné par scodoc
     */
    function verifieMdp($username, $motDePasse){



      if($this->getDebugMessage){
        echo("--DEBUG: mdl_bd: verifMdp");
        echo "<br>";
      }

      $url = 'http://infoweb/~sidi-presence/faux_Scodoc/';
//______________________________________________________________________________

      $ch2 = curl_init();

      $defaults = array(
        //CURLOPT_POST => count($fields),
        CURLOPT_HEADER => TRUE,
        CURLOPT_URL => $url,
        //CURLOPT_TIMEOUT => 4,
        //CURLOPT_POSTFIELDS => http_build_query($fields),
        CURLOPT_FOLLOWLOCATION => FALSE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_FORBID_REUSE => TRUE,
      );

      curl_setopt_array ($ch2, $defaults);

      $HTML = curl_exec($ch2);

      curl_close($ch2);
//______________________________________________________________________________

      $fields = array(
         'login' => $username,
         'mdp' => $motDePasse,
      );

      $ch = curl_init();

      $defaults = array(
        CURLOPT_POST => count($fields),
        CURLOPT_HEADER => TRUE,
        CURLOPT_URL => $url,
        //CURLOPT_TIMEOUT => 4,
        CURLOPT_POSTFIELDS => http_build_query($fields),
        CURLOPT_FOLLOWLOCATION => FALSE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_COOKIEFILE => "cookie.txt",
        CURLOPT_COOKIEJAR => "cookie.txt",
      );

      curl_setopt_array ($ch, $defaults);

      $newHTML = curl_exec($ch);

      $newUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

      curl_close($ch);
//______________________________________________________________________________

      $HTML = (string)$HTML;
      $newHTML = (string)$newHTML;

      if($this->getDebugMessage){
        echo("---DEBUG: premier HTML= ".$HTML);
        echo "<br>";
        echo("---DEBUG: nouvel HTML = ".$newHTML);
        echo "<br>";
      }
//______________________________________________________________________________

      $result = array(
         '0' => ($HTML != $newHTML),
         '1' => $newHTML,
         '2' => $newUrl,
      );
      return $result;



    }




//______________________________________________________________________________
//______________________________________________________________________________





    /* role : Fonction qui permet la verification du module, de la classe et de la semaine à travers l'interface de scodoc
     * precondition : le module, la classe et la semaine sont des entrees valides
     * postcondition : retourne l'url retourné par scodoc
     */
    function verifieChoixClasses($url, $HTML, $module, $classe, $semaine){
      if($this->getDebugMessage){
        echo("--DEBUG: mdl_bd: verifieChoixClasses");
        echo "<br>";
        echo("---DEBUG: mdl_bd: verifieChoixClasses, partie departement");
        echo "<br>";
      }
//______________________________PARTIE DEPARTEMENT______________________________

      $fields = array(
         'departement' => "Informatique"
      );

      $ch = curl_init();

      $defaults = array(
        CURLOPT_POST => count($fields),
        CURLOPT_URL => $url,
        CURLOPT_POSTFIELDS => http_build_query($fields),
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_COOKIEFILE => "cookie.txt",
        CURLOPT_COOKIEJAR => "cookie.txt",
      );

      curl_setopt_array ($ch, $defaults);

      $newHTML = curl_exec($ch);

      $newUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

      curl_close($ch);

//______________________________________________________________________________
/*
      $HTML = (string)$HTML;
      $newHTML = (string)$newHTML;

      echo("----DEBUG: premier HTML= ".$HTML);
      echo "<br>";
      echo("----DEBUG: nouvel HTML = ".$newHTML);
      echo "<br>";
*/
//______________________________________________________________________________

      if($newHTML == $HTML){

        if($this->getDebugMessage){
          echo("---DEBUG: mdl_bd: verifieChoixClasses, departement errone");
          echo "<br>";
        }

        $result = array(
          '0' => FALSE,
          '1' => $newHTML,
          '2' => $newUrl,
        );

        return $result;
//__________________________PARTIE SEMAINE ET MODULE____________________________
      }else{

        if($this->getDebugMessage){
          echo("---DEBUG: mdl_bd: verifieChoixClasses, departement correct");
          echo "<br>";
          echo("---DEBUG: mdl_bd: verifieChoixClasses, debut semaine et module");
          echo "<br>";
        }

        $url = $newUrl;
        $HTML = $newHTML;
//______________________________________________________________________________

        $fields = array(
           'semaine' => "".$semaine,
           'module' => $module,
        );

        $ch = curl_init();

        $defaults = array(
          CURLOPT_POST => count($fields),
          CURLOPT_URL => $url,
          CURLOPT_POSTFIELDS => http_build_query($fields),
          CURLOPT_RETURNTRANSFER => TRUE,
          CURLOPT_COOKIEFILE => "cookie.txt",
          CURLOPT_COOKIEJAR => "cookie.txt",
        );

        curl_setopt_array ($ch, $defaults);

        $newHTML = curl_exec($ch);

        $newUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        curl_close($ch);
//______________________________________________________________________________

        $HTML = (string)$HTML;
        $newHTML = (string)$newHTML;

        if($this->getDebugMessage){
          echo("----DEBUG: premier HTML= ".$HTML);
          echo "<br>";
          echo("----DEBUG: nouvel HTML = ".$newHTML);
          echo "<br>";
        }
//______________________________________________________________________________

        if($newHTML == $HTML){

          if($this->getDebugMessage){
            echo("---DEBUG: mdl_bd: verifieChoixClasses, semaine module errone");
            echo "<br>";
          }

          $result = array(
            '0' => FALSE,
            '1' => $newHTML,
            '2' => $newUrl,
          );

          return $result;
//_______________________________PARTIE CLASSE__________________________________

        }else{

          if($this->getDebugMessage){
            echo("---DEBUG: mdl_bd: verifieChoixClasses, semaine module correct");
            echo "<br>";
            echo("---DEBUG: mdl_bd: verifieChoixClasses, debut classe");
            echo "<br>";
          }

          $url = $newUrl;
          $HTML = $newHTML;
//______________________________________________________________________________

          $fields = array(
             'groupe' => $classe
          );

          $ch = curl_init();

          $defaults = array(
            CURLOPT_POST => count($fields),
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => http_build_query($fields),
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_COOKIEFILE => "cookie.txt",
            CURLOPT_COOKIEJAR => "cookie.txt",
          );

          curl_setopt_array ($ch, $defaults);

          $newHTML = curl_exec($ch);

          $newUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

          curl_close($ch);
//______________________________________________________________________________

          $HTML = (string)$HTML;
          $newHTML = (string)$newHTML;

          if($this->getDebugMessage){
            echo("----DEBUG: premiere url= ".$url);
            echo "<br>";
            echo("----DEBUG: nouvelle url = ".$newUrl);
            echo "<br>";
          }
//______________________________________________________________________________

          $result = array(
             '0' => ($newHTML != $HTML),
             '1' => $newHTML,
             '2' => $newUrl,
          );

          if($this->getDebugMessage){
            echo("---DEBUG: mdl_bd: verifieChoixClasses, fin classe");
            echo "<br>";
          }

          return $result;
        }

      }



    }




//______________________________________________________________________________
//______________________________________________________________________________




    /* role : Fonction qui permet de récupérer la liste des noms des élèves
     * precondition : unUrl est une url sous forme d'une chaine de caractère qui mène à la page de pointage de scodoc
     * postcondition : retourne la liste des noms des élèves
     */
    function getListeEleve($unHtml){
      return $this->getTexteScodocHTML($unHtml, '<input class="etudiant" name="*" value="oui" type="checkbox">');
    }





    /* role : Fonction qui permet de récupérer la liste des résultats qui correspond à des critères de recherche
     * precondition : unUrl est une url sous forme d'une chaine de caractère qui mène à la page de pointage de scodoc
     *                recherche est une recherche XML valide (exemple: '//table[@class="pricing"]')
     * postcondition : retourne la liste des résultats qui correspond aux critères de recherche
     */
    function getTexteScodocURL($unUrl, $recherche){

      //PROBLEME ICI - La methode ne fonctionne pas

      $content = file_get_contents($unUrl);
      preg_match($recherche, $content, $match);
      return $match;

    }




    /* role : Fonction qui permet de récupérer la liste des résultats qui correspond à des critères de recherche
     * precondition : unUrl est une url sous forme d'une chaine de caractère qui mène à la page de pointage de scodoc
     *                recherche est une recherche XML valide (exemple: '//table[@class="pricing"]')
     * postcondition : retourne la liste des résultats qui correspond aux critères de recherche
     */
    function getTexteScodocHTML($unHtml, $recherche){

      //PROBLEME ICI - La methode ne fonctionne pas

      $doc = new DomDocument();
      //$html = tidy_repair_string($html);
      var_dump($unHtml);

      $doc->loadHtml($unHtml); //initialisation DomDocument à partir du fichier HTML
      //var_dump($doc);

      $xpath = new DomXPath($doc); //initialisation DomXPath à partir du fichier DomDocument

      $result = array();
      foreach ($xpath->query($recherche) as $node) { //la section entre parenthèses est la récupération de tous les textes correspondant à la recherche en une liste
        $result[] = $node;
      }

      var_dump($result);
      
      return $result;

    }





    /* role : Fonction qui permet la verification des absences à travers l'interface de scodoc
     * precondition : eleves sont des entrees valides
     * postcondition : retourne l'url retourné par scodoc
     */
    function verifieChoixAbsences($unUrl, $eleves){
      //TODO
      //il suffit de reprendre la même méthode des autres fonctions "verifie[schtroupf]"
    }




  }



 ?>
