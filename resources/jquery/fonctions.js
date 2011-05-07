$(document).ready(function() {
    
    // On commence par mettre les images en noir et blanc.
    $(".li_choixville").each(function() {
        $img=$(this);
        var urlImageCouleur = $img.find("img").attr("src"); //Get image url
        var urlImageNB = urlImageCouleur.replace(/.jpg/, '_gris.jpg');
        $img.find("img").attr("src",urlImageNB);
    });

    $(".li_choixville").hover(function() { //On hover...
        var urlImageNB = $(this).find("img").attr("src"); //Get image url 
        var urlImageCouleur = urlImageNB.replace(/_gris/, '');

        $(this).find("img").attr("src",urlImageCouleur);
    } , function() { //on hover out...
        //Fade the image to full opacity
        var urlImageCouleur = $(this).find("img").attr("src"); //Get image url 
        var urlImageNB = urlImageCouleur.replace(/.jpg/, '_gris.jpg');
        $(this).find("img").attr("src",urlImageNB);
    });

});