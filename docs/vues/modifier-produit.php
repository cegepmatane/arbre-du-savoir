<?php
    $idFormation = $_GET['idFormation'];

    include_once(__DIR__."/../controlleurs/FormationControlleur.php");
    $formationControlleur = new \controlleurs\FormationControlleur();

    if (isset($_POST['boutonModifierFormation'])) {
        $formationControlleur->modifierLaFormation($_POST['modifierFormationTitre'], $_POST['modifierFormationDescription'], $_POST['modifierFormationDateDebut'], $_POST['modifierFormationDateFin'], $_POST['modifierFormationPrix'], $_POST['modifierFormationCertification'], $_POST['modifierFormationNiveau'], $_POST['modifierFormationPhoto'], $idFormation);
        header('Location: /arbre-du-savoir/docs/vues/admin.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Arbre du Savoir</title>
    <link href="css/modifier-produit.css" rel="stylesheet">
    <script src="js/modifier-produit.js"></script>
</head>
<body>
    <header>
            <img src='../images/hamb.png' alt='Programmer en C' width='90px' height='80px'>
            <h1>Arbre du Savoir</h1>
            <img src='../images/logo.png' alt='Programmer en C' width='90px' height='80px'>
    </header>
    <form method='post'>
    <div class='body'>
        <div class='titre'>
            <h2>Modifier le produit</h2>
        </div>

        <?php

        $formationControlleur->saisieInputPageModifier($idFormation);

        ?>
    </div>
    </form>
    <footer>
        <h3>Condition d'utilisation</h3>
        <h3>Date mise à jour</h3>
        <h3>Réseaux sociaux</h3>
    </footer>
</body>
</html>

