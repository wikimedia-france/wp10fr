<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Gestion des lieux où se trouvent les panneaux.
 *
 * @author Ash_Crow_2
 */
class Place {
  public $list = array (
    1 => array (
        'lieu'      =>  'Parc du Thabor',
        'article1'  =>  'Parc du Thabor',
        'article2'  =>  'Rosier',
        'latitude'  =>  48.11416667,
        'longitude' =>  -1.67,
        'minimap'   =>  'thabor.png',
        'type'      =>  'parc',
        'tweet'     =>  'au Thabor'
    ),
    2 => array (
        'lieu'      =>  'Place Hoche',
        'article1'  =>  'Université de Rennes',
        'article2'  =>  'Histoire de Rennes',
        'latitude'  =>  48.115298,
        'longitude' =>  -1.677252,
        'minimap'   =>  'hoche.png',
        'type'      =>  'place',
        'tweet'     =>  'place Hoche'
    ),
    3 => array (
        'lieu'      =>  'Place Sainte-Anne',
        'article1'  =>  'Anne de Bretagne',
        'article2'  =>  'Métro de Rennes',
        'latitude'  =>  48.1144,
        'longitude' =>  -1.68036,
        'minimap'   =>  'sainteanne.png',
        'type'      =>  'place',
        'tweet'     =>  'place Sainte-Anne'
    ),
    4 => array (
        'lieu'      =>  'Cathédrale Saint-Pierre',
        'article1'  =>  'Cathédrale Saint-Pierre de Rennes',
        'article2'  =>  'Porte mordelaise',
        'latitude'  =>  48.11138889,
        'longitude' =>  -1.68333333,
        'minimap'   =>  'cathedrale.png',
        'type'      =>  'monument',
        'tweet'     =>  'devant la cathédrale'
    ),
    5 => array (
        'lieu'      =>  'Mairie',
        'article1'  =>  'Mairie de Rennes',
        'article2'  =>  'Opéra de Rennes',
        'latitude'  =>  48.111389,
        'longitude' =>  -1.68,
        'minimap'   =>  'mairie.png',
        'type'      =>  'monument',
        'tweet'     =>  'devant la mairie'
    ),
    6 => array (
        'lieu'      =>  'Parlement de Bretagne',
        'article1'  =>  'Palais du parlement de Bretagne',
        'article2'  =>  'Tramway de Rennes',
        'latitude'  =>  48.112778,
        'longitude' =>  -1.677778,
        'minimap'   =>  'parlement.png',
        'type'      =>  'monument',
        'tweet'     =>  'devant le Parlement'
    ),
    7 => array (
        'lieu'      =>  'Musée des Beaux-Arts',
        'article1'  =>  'Musée des beaux-arts de Rennes',
        'article2'  =>  'Sendai',
        'latitude'  =>  48.109444,
        'longitude' =>  -1.675,
        'minimap'   =>  'mbar.png',
        'type'      =>  'monument',
        'tweet'     =>  'devant le Musée des Beaux-Arts'
    ),
    8 => array (
        'lieu'      =>  'Lycée Émile-Zola',
        'article1'  =>  'Affaire Dreyfus',
        'article2'  =>  'LE vélo STAR',
        'latitude'  =>  48.108611,
        'longitude' =>  -1.674722,
        'minimap'   =>  'zola.png',
        'type'      =>  'monument',
        'tweet'     =>  'devant le lycée Zola'
    ),
    9 => array (
        'lieu'      =>  'Gare',
        'article1'  =>  'Gare de Rennes',
        'article2'  =>  'Jean Janvier',
        'latitude'  =>  48.1033,
        'longitude' =>  -1.6725,
        'minimap'   =>  'gare.png',
        'type'      =>  'monument',
        'tweet'     =>  'à la gare'
    ),
    10 => array (
        'lieu'      =>  'Esplanade Charles de Gaulle',
        'article1'  =>  'Champs Libres',
        'article2'  =>  'Rencontres Trans Musicales',
        'latitude'  =>  48.106056,
        'longitude' =>  -1.676278,
        'minimap'   =>  'esplanade.png',
        'type'      =>  'evenement',
        'tweet'     =>  'sur l’esplanade Charles de Gaulle'
    )
  );

      public function automap($numero) {
      /*
       * La fonction appelle dans une frame une carte OSM centrée sur les coordonnées du panneau.
       */
    // bordures de la carte :
        $latPoint  = $this->list[$numero]['latitude'];
        $longPoint = $this->list[$numero]['longitude'];
        $longGauche = $longPoint - 0.00145;
        $latBas   = $latPoint - 0.00106;
        $longDroite = $longPoint + 0.00134;
        $latHaut  = $latPoint + 0.00124;
        $url = "http://www.openstreetmap.org/export/embed.html?bbox=".$longGauche.",".$latBas.",".$longDroite.",".$latHaut."&amp;layer=osmarender&amp;marker=".$latPoint.",".$longPoint;
        echo '<iframe width="300" height="425" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            src="'.$url.'" style="border: 1px solid black"></iframe>';
  }

  public function fixedmap($numero) {
      /*
       * La fonction appelle la carte stockée en dur.
       */
      echo '<img src="../resources/minimaps/'.$this->list[$numero]['minimap'].'" alt="Carte de localisation" />';
  }
}
?>
