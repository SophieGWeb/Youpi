//test pour voir si JQUery est chargé

//   if(jQuery){
//     alert("jQuery est chargé");
//   }
//    else{
//       alert("jQuery n'est pas chargé");
//   }

$( "#button" ).click(function() {
    var value = $( '#monChamp' ).val();

    if(value<=231 ){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 7.50€";
    
    }else if ((value >=231) && (value <=310 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 8.40€";

    }else if ((value >=311) && (value <=380 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 9.40€";

    }else if ((value >=381) && (value <=460 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 10.20€";

    }else if ((value >=461) && (value <=540 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 11.40€";

    }else if ((value >=541) && (value <=610 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 12.90€";

    }else if ((value >=611) && (value <=690 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 14.10€";

    }else if ((value >=691) && (value <=760 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 15.30€";

    }else if ((value >=761) && (value <=840 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 16.50€";

    }else if ((value >=841) && (value <=920 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 17.70€";

    }else if ((value >=921) && (value <=990 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 8.40€";

    }else if ((value >=991) && (value <=1070 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 20.40€";

    }else if ((value >=1071) && (value <=1500 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 21.50€";

    }else if ((value >=1501) && (value <=2500 )){
        document.getElementById("resultat").innerHTML="Vous avez un tarif de 22.70€";

    }else{
        document.getElementById("resultat").innerHTML="le tarif maximal est de 23.80€, pensez à vérifier votre CF auprès de la CAF si vous pensez ne pas être à +de 2500";
        }
})
