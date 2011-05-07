<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Wikipédia fête ses dix ans en France</title>
        <link rel="stylesheet" href="resources/main.css" />
        <script type="text/javascript" src="resources/jquery/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="resources/jquery/fonctions.js"></script>
    </head>
    <body>
        <div id ="wrapper">
            <?php
            include "files/header.php";
            if ((isset($_GET["page"])) AND ($_GET["page"] == "licences")) {
                include "files/navbar.php";
                include "files/licences.php";
            }
            else {
                 ?>
            <ul id="ul_choixville">
                <li id="Nanterre" class="li_choixville">
                    <a href="http://wp10.fr/nanterre/">
                        <div class="div_choixville"><img class="img_choixville" src="resources/images/nanterre.jpg" alt="Nanterre" /></div>
                    </a>
                </li>
                <li id="Rennes" class="li_choixville">
                    <a href="http://wp10.fr/rennes/">
                        <div class="div_choixville"><img class="img_choixville" src="resources/images/rennes.jpg" alt="Rennes" /></div>
                    </a>
                </li>
                <li id="Toulouse" class="li_choixville">
                    <a href="http://wp10.fr/toulouse/">
                        <div class="div_choixville"><img class="img_choixville" src="resources/images/toulouse.jpg" alt="Toulouse" /></div>
                    </a>
                </li>
            </ul>
            <?php
            }
            include "files/footer.php"; ?>
        </div>
    </body>
</html>
