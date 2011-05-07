<?php
//Définition des lieux où sont disposés les dix panneaux. Pas besoin d'une BDD, on va faire ça en dur :
include_once('../classes/Place.class.php');
$Place = new Place();

// barre de navigation
$navbar= '<div data-role="navbar" class="nav-glyphish nav-glyphish-vertical">
		<ul>
                    <li><a class="house" href="index.php" data-role="button" data-icon="custom" >Accueil</a></li>
                    <li><a class="map" href="index.php?page=Liste" data-role="button" data-icon="custom" >Les panneaux</a></li>
		</ul>
          </div>';

function twitterLink($Place,$numero) {
    $text= 'Je suis '.$Place->list[$numero]['tweet'].' pour les 10 ans de #Wikipédia à #Rennes ! http://ashtree.eu/wp10r/'.$numero.' #wp10 #wp10r';
    echo 'http://twitter.com/home?status='.urlencode($text);
}

///////////////////////////////// Code des pages
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Wikipédia dans Rennes</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="resources/jquerymobile/jquery.mobile-1.0a4.min.css" />
        <link rel="stylesheet" href="resources/main.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
	<script type="text/javascript" src="resources/jquerymobile/jquery.mobile-1.0a4.min.js"></script>

</head>
<body>

<div data-role="page" data-theme="d">
<?php
    if ((isset($_GET["page"])) AND (is_numeric($_GET["page"]))) {
        $numero = $_GET["page"]; ?>
        <div data-role="header">
		<h1><?php echo($Place->list[$numero]['lieu']); ?></h1>
                <?php echo $navbar; ?>
	</div><!-- /header -->
	<div data-role="content">
                <div data-role="controlgroup" class="nav-glyphish">
                    <a class="puzzle" data-icon="custom" href="http://fr.wikipedia.org/wiki/<?php echo $Place->list[$numero]['article1']; ?>" data-role="button">Lire l'article <?php echo $Place->list[$numero]['article1']; ?></a>
                    <a class="puzzle" data-icon="custom" href="http://fr.wikipedia.org/wiki/<?php echo $Place->list[$numero]['article2']; ?>" data-role="button">Lire l'article <?php echo $Place->list[$numero]['article2']; ?></a>
                    <a class="bird" data-icon="custom" href="<?php twitterLink($Place,$numero); ?>" data-role="button">Envoyer un tweet</a>
                    <a class="map" data-icon="custom" href="index.php?page=Liste" data-role="button">Trouver un autre panneau</a>
                </div>

                <div class="centered">
                    <?php $Place->fixedmap($numero); ?>
                 </div>
            </div>
	<!-- /content -->

    <?php }
    else if ((isset($_GET["page"])) AND ($_GET["page"] == "Liste")) { ?>
        <div data-role="header">
		<h1>Liste des panneaux</h1>
                <?php echo $navbar; ?>
	</div><!-- /header -->
	<div data-role="content">
            <p>10 panneaux sont dispersés dans la ville. Découvrez-les tous !</p>
            <ul data-role="listview" data-theme="c">
                <?php
                foreach($Place->list AS $numero => $infos){
                    echo '<li><a href="index.php?page='.$numero.'">'.$infos['lieu'].'</a></li>';
                }

                ?>
            </ul>
	</div><!-- /content -->
   <?php }
    else if ((isset($_GET["page"])) AND ($_GET["page"] == "Licences")) { ?>
        <div data-role="header">
		<h1>Licences</h1>
                <?php echo $navbar; ?>
	</div><!-- /header -->
	<div data-role="content">
            <p>Licences des média utilisés sur ce mini-site</p>
            <ul>
                <li>Les <strong>cartes</strong> sont CC-By-SA OpenStreetMap & contributors </li>
                <li>Les <strong>icônes</strong> sont tirées du set Glyphish (CC-by Joseph Wain)</li>
                <li>Le texte des <strong>articles</strong> de Wikipédia utilisés sur les pancartes est sous GFDL/CC-By-SA contributeurs de Wikipédia</li>
            </ul>
	</div><!-- /content -->
    <?php }
    else { ?>
	<div data-role="header">
		<h1>Wikipédia dans Rennes</h1>
                <?php echo $navbar; ?>
	</div><!-- /header -->
	<div data-role="content">
            <div class="centered"><img src="http://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Wikipedia-logo.svg/300px-Wikipedia-logo.svg.png" alt="Logo Wikipédia" /></div>

            <div data-role="collapsible" data-collapsed="true" data-theme="c">
                <h3>Wikipédia c'est quoi ?</h3>
		<p>Wikipédia est un projet d’encyclopédie collective établie sur Internet,
                    universelle, multilingue et fonctionnant sur le principe du wiki.
                    Wikipédia a pour objectif d’offrir un contenu librement réutilisable,
                    neutre et vérifiable, que chacun peut modifier et améliorer.</p>
            </div>

            <div data-role="collapsible" data-collapsed="true" data-theme="c">
                <h3>Wikipédia fête ses 10 ans</h3>
                <p>En 2011, Wikipédia fête ses 10 ans. Pour fêter l’événement, un groupe de participants
                    Rennais s’associent à la ville de Rennes pour vous faire découvrir «&nbsp;en grand&nbsp;» l’encyclopédie
                    et la ville, en disposant devant 10 monuments des panneaux reprenant les articles les concernant.</p>
            </div>

            <div data-role="collapsible" data-collapsed="true" data-theme="c">
                <h3>Venez nous rejoindre !</h3>
                <p>Découvrir ces panneaux vous a plu ? Vous avez envie de découvrir Wikipédia ? D'y participer ? N’hésitez pas : venez
                    nous rejoindre à la Cantine numérique rennaise ! Nous y serons le mecredi 25 mai de 19h à 22h et le samedi 28 toute
                la journée pour un atelier d'initiation.</p>
            </div>
	</div><!-- /content -->  <?php } ?>

        <div data-role="footer" data-theme="c" class="ui-bar">
            <a href="index.php" data-role="button" data-icon="home" >Accueil</a>
            <a href="index.php?page=Liste" data-role="button" data-icon="grid">Les panneaux</a>
            <a href="index.php?page=Licences" data-role="button" data-icon="info">Licences</a>
        </div><!-- /footer -->
      
</div><!-- /page -->

</body>
</html>