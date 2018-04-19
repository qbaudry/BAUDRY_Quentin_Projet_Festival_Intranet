<?php

include("includes/_debut.inc.php");

// SUPPRIMER LE TYPE DE CHAMBRE SÉLECTIONNÉ

$id = $_REQUEST['id'];  // Non obligatoire mais plus propre
echo "
<br><center>Voulez-vous vraiment supprimer le groupe $id ?
<h3><br>
<a href='cGestionGroupes.php?action=validerSupprimerGroupe&id=$id'>
Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
<a href='cGestionGroupes.php'>Non</a></h3></center>";

include("includes/_fin.inc.php");

