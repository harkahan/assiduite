function init(){

  var el1=document.getElementById("Module");
  el1.addEventListener("change", moduleValide , true);

  var el2=document.getElementById("Classe");
  el2.addEventListener("change", classeValide , true);

  var el3=document.getElementById("Jour");
  el3.addEventListener("change", jourValide , true);

  var el4=document.getElementById("Mois");
  el4.addEventListener("change", moisValide , true);

  var el4=document.getElementById("Annee");
  el4.addEventListener("change", anneeValide , true);


  }
// vérifie si le module entrée correspond au pattern attendu
function moduleValide() {
  var val = this.value;
  var taille = val.length;

  if ((taille<4) || (val.charAt(0)!="M") ||
  (isNaN(val.charAt(1))) || (isNaN(val.charAt(2))) ||
  (isNaN(val.charAt(3)))) {

    alert(val+" n'est pas un module valide");
    //alert("DEBUG : "+(taille<4)+" "+(val.charAt(0)!="M")+" "+(isNaN(val.charAt(1)))+" "+(isNaN(val.charAt(2)))+" "+(isNaN(val.charAt(3))));
    //alert("DEBUG : this.value.length = "+taille+" < 4 = "+(taille<4));
    this.value="";
    }
  }

// vérifie si la classe entrée correspond au pattern attendu
function classeValide() {
  var val = this.value;
  var last=val.length;
  last--;
  if ((!isNaN(val.charAt(0))) || (isNaN(val.charAt(last)))){
    alert(val+" n'est pas une classe valide");
    alert ("DEBUG : "+val.charAt(0)+" = "+(!isNaN(val.charAt(0)))+" "+val.charAt(last)+" = "+(isNaN(val.charAt(last))));
    this.value="";
    }
  }

  // vérifie si le jour entrée correspond au pattern attendu
  function jourValide() {
    var val = this.value;
    if (isNaN(val)) {
      alert(val+" doit être un nombre");
      this.value="";
      }
    else if ((val<1) || (val>31)){
      alert(val+" doit être un nombre compris entre 1 et 31");
      this.value="";
      }
    }

    // vérifie si le mois entrée correspond au pattern attendu
    function moisValide() {
      var val = this.value;
      if (isNaN(val)) {
        alert(val+" doit être un nombre");
        this.value="";
        }
      else if ((val<1) || (val>12)){
        alert(val+" doit être un nombre compris entre 1 et 12");
        this.value="";
        }
      }

      // vérifie si l'année entrée correspond au pattern attendu
      function anneeValide() {
        var val = this.value;
        if (isNaN(val)) {
          alert(val+" doit être un nombre");
          this.value="";
          }
        else if ((val<2015) || (val>2018)){
          alert(val+" doit être un nombre compris entre 2015 et 2018");
          this.value="";
          }
        }
