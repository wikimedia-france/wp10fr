<?php
//Définition des lieux où sont disposés les dix panneaux. Pas besoin d'une BDD, on va faire ça en dur :
include_once('../classes/Place.class.php');
$Place = new Place();

// barre de navigation
$navbar= '<ul>
            ● <li><a class="house" href="index.php" data-role="button" data-icon="custom" >Accueil</a></li> ●
            <li><a class="map" href="index.php?page=Liste" data-role="button" data-icon="custom" >Les panneaux</a></li> ●
        </ul>';

function twitterLink($Place,$numero) {
    $text= 'Je suis '.$Place->list[$numero]['tweet'].' pour les 10 ans de #Wikipédia à #Rennes ! http://ashtree.eu/wp10r/'.$numero.' #wp10 #wp10r';
    echo 'http://twitter.com/home?status='.urlencode($text);
}

///////////////////////////////// Code des pages
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Wikipédia fête ses dix ans à Rennes</title>
        <link rel="stylesheet" href="../resources/main.css" />
        <link rel="stylesheet" href="../resources/rennes.css" />
        <script type="text/javascript" src="../resources/jquery/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="../resources/jquery/fonctions.js"></script>
    </head>
    <body>
        <div id="wrapper">
        <?php
         include "../files/header.php";
         include "../files/navbar.php";
         ?>
        <div id="content">
	<div id="rennes_header">
            <h2>Wikipédia dans Rennes</h2>
             <?php echo $navbar; ?>
	</div><!-- /header -->
<?php
    if ((isset($_GET["page"])) AND (is_numeric($_GET["page"]))) {
        $numero = $_GET["page"]; ?>
		<h3><?php echo($Place->list[$numero]['lieu']); ?></h3>
                
	<div id="rennes_content">
                <ul>

                    <li><a class="puzzle" data-icon="custom" href="http://fr.wikipedia.org/wiki/<?php echo $Place->list[$numero]['article1']; ?>" data-role="button">Lire l'article <?php echo $Place->list[$numero]['article1']; ?></a></li>
                    <li><a class="puzzle" data-icon="custom" href="http://fr.wikipedia.org/wiki/<?php echo $Place->list[$numero]['article2']; ?>" data-role="button">Lire l'article <?php echo $Place->list[$numero]['article2']; ?></a></li>
                    <li><a class="bird" data-icon="custom" href="<?php twitterLink($Place,$numero); ?>" data-role="button">Envoyer un tweet</a></li>
                    <li><a class="map" data-icon="custom" href="index.php?page=Liste" data-role="button">Trouver un autre panneau</a></li>
                </ul>

                <div class="centered">
                    <?php $Place->automap($numero); ?>
                 </div>
            </div>
	<!-- /content -->

    <?php }
    else if ((isset($_GET["page"])) AND ($_GET["page"] == "Liste")) { ?>
		<h3>Liste des panneaux</h3>
	<div id="rennes_content">
            <p>10 panneaux sont dispersés dans la ville. Découvrez-les tous !</p>

            <div id="citymap"><img src="../resources/minimaps/rennes.png" alt="Carte de Rennes"/></div>
            <ul data-role="listview" data-theme="c">
                <?php
                foreach($Place->list AS $numero => $infos){
                    echo '<li><a href="index.php?page='.$numero.'">'.$infos['lieu'].'</a></li>';
                }

                ?>
            </ul>
	</div><!-- /content -->
   <?php }
    else { ?>

            <p>Du 21 au 28 mai, dix panneaux seront disposés dans dix lieux clés de Rennes : monuments ou thématiques intéressantes. Ces panneaux seront recto-verso, avec sur chaque face le résumé d'un article de Wikipédia (ex. l'article sur le parc du Thabor, devant le Thabor) Le tout disposé comme un article avec l'interface de Wikipédia. A l'emplacement de la photo, un cadre vide permettant de voir à travers le panneau le sujet de l'article.</p>

<p>Le 25 mai, soirée à la Cantine numérique, atelier web autour de Wikipédia animé par la NCO (groupement de Wikipédiens bretons) en collaboration avec Flavien Chantrel (modérateur).</p>

<p>Le 28 mai, toute la journée à la Cantine numérique, un atelier permanent tenu par des membres de la NCO pour accueillir le public, répondre à leur question et accompagner leurs premiers pas sur Wikipédia. En parallèle, des mini-confs, présentations sur divers sujets autour de Wikipédia, des projets Wikimedia, des autres projets wiki, de la connaissance libre... Nous ferons intervenir plusieurs invités qui s'exprimeront autour de Wikipédia.</p>

<p>Sur les panneaux disposés en ville, un message, une <a href="http://fr.wikipedia.org/wiki/URL" title="URL : Uniform Ressource Locator — article sur Wikipédia">URL</a> et un <a href="http://fr.wikipedia.org/wiki/Code QR" title="Code QR ou QRcode — article sur Wikipédia">QRcode</a> inviteront le public à visiter le site de l'évènement, qui contiendra la liste des lieux où se trouvent les panneaux, et à se rendre à la Cantine pour les ateliers et les présentations.</p>
 <?php } ?>
        </div> <!-- fin content -->
        <?php
         include "../files/footer.php";
         ?>
</div>
</body>
</html>