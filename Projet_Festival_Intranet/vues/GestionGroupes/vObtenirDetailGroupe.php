<?php

use modele\dao\GroupeDAO;
use modele\metier\Groupe;
use modele\dao\Bdd;

require_once __DIR__ . '/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// OBTENIR LE DÉTAIL DE L'ÉTABLISSEMENT SÉLECTIONNÉ

$unGroupe = GroupeDAO::getOneById($id);
/* @var $unGroupe Groupe  */
$id = $unGroupe->getId();
$nom = $unGroupe->getNom();
$identite = $unGroupe->getIdentite();
$adresse = $unGroupe->getAdresse();
$nbPers = $unGroupe->getNbPers();
$nomPays = $unGroupe->getNomPays();
$hebergement = $unGroupe->getHebergement();


echo "
<br>
<table width='60%' cellspacing='0' cellpadding='0' class='tabNonQuadrille'>
   
   <tr class='enTeteTabNonQuad'>
      <td colspan='3'><strong>$nom</strong></td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td  width='20%'> Id: </td>
      <td>$id</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Identité: </td>
      <td>$identite</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Adresse: </td>
      <td>$adresse</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Nombre de personnes: </td>
      <td>$nbPers</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Nom du Pays: </td>
      <td>$nomPays</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Hebergement: </td>
      <td>$hebergement</td>
   </tr>
   
</table>
<br>
<a href='cGestionGroupes.php'>Retour</a>";

include("includes/_fin.inc.php");

