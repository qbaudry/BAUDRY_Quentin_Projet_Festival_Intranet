<?php
use modele\dao\GroupeDAO;
use modele\dao\AttributionDAO;
use modele\dao\Bdd;
require_once __DIR__.'/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// AFFICHER L'ENSEMBLE DES GROUPES
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// GROUPE

echo "
<br>
<table width='55%' cellspacing='0' cellpadding='0' class='tabNonQuadrille'>

   <tr class='enTeteTabNonQuad'>
      <td colspan='4'><strong>Groupes</strong></td>
   </tr>";

$lesGroupes = GroupeDAO::getAll();
// BOUCLE SUR LES GROUPES
foreach ($lesGroupes as $UnGroupe) {
    $id = $UnGroupe->getId();
    $nom = $UnGroupe->getNom();
    $identite = $UnGroupe->getIdentite();
    $adresse = $UnGroupe->getAdresse();
    $nbPers = $UnGroupe->getNbPers();
    $nomPays = $UnGroupe->getNomPays();
    $hebergement = $UnGroupe->getHebergement();
    echo "
	 <tr class='ligneTabNonQuad'>
         <td width='52%'>$nom</td>
        
         <td width='16%' align='center'> 
         <a href='cGestionGroupes.php?action=detailGroupe&id=$id'>
         Voir détail</a></td>
        
         <td width='16%' align='center'> 
         <a href='cGestionGroupes.php?action=demanderModifierGroupe&id=$id'>
         Modifier</a></td>";
    $ok = GroupeDAO::isAnExistingIdInAttribution($id);
    if($ok == 0){
        echo "
         <td width='16%' align='center'> 
         <a href='cGestionGroupes.php?action=demanderSupprimerGroupe&id=$id'>
         Supprimer</a></td>";
    } else {
        echo "<td width='16%' align='center'></td>";
    }
    
        

    // S'il existe déjà des attributions pour les groupes il faudra
    // d'abord les supprimer avant de pouvoir supprimer le groupe
    // if (!existeAttributionsGp($connexion, $id)) {
    /*$lesAttributionsDeCeGroupes = AttributionDAO::getAllByIdGp($id);
    if (count($lesAttributionsDeCeGroupes)==0) {
        echo "
            <td width='16%' align='center'> 
            <a href='cGestionGroupes.php?action=demanderSupprimerGp&id=$id'>
            Supprimer</a></td>";
    } else {
        echo "
            <td width='16%'>&nbsp; </td>";
    }*/
    echo "
      </tr>";
}
echo "
</table><br>
<a href='cGestionGroupes.php?action=demanderCreerGroupe'>
Création d'un Groupe</a >";

include("includes/_fin.inc.php");