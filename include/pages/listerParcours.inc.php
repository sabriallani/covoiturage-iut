<?php
require_once("include/autoload.inc.php");

$pdo = new MyPdo();
$parcoursManager = new ParcoursManager($pdo);
$VilleManager = new VilleManager($pdo);
$parcours = $parcoursManager->getAllParcours();
?>

<h1>Liste des parcours proposés</h1>

<table class="table">
    <tr>
        <th>Numéro</th>
        <th>Ville de départ</th>
        <th>Ville d'arrivée</th>
        <th>Nombre de Km</th>
    </tr>
    <?php
    foreach ($parcours as $par) {
    ?>
    <tr>
        <td><?php echo $par->getParNum() ?></td>
        <td><?php echo $VilleManager->getVilNom($par->getVilNum1())->vil_nom ?></td>
        <td><?php echo $VilleManager->getVilNom($par->getVilNum2())->vil_nom ?></td>
        <td><?php echo $par->getParKm() ?></td>
    </tr>
    <?php
    }
    ?>
</table>