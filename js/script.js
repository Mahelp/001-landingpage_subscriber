$(document).ready(function(){



//1 si bouton charte alors enabled le bouton valider
$(submit2).on('click', function(){

console.log("coucou");
$(submit).show();
});

//2 si bouton valider alors afficher compter
$(submit).on('click', function(){
$(demo).show();
});




});