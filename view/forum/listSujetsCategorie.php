<?php
    $sujets = $result["data"]['sujets'];
?>

<h1>liste sujets / catégorie</h1>

<?php
foreach($sujets as $sujet){

    ?>
    <p>
        <a href="index.php?ctrl=forum&action=listMessages&id=<?=$sujet->getId()?>">
            <?=$sujet->getTitreSujet()?>
        </a>
        <?=" Utilisateur: ".$sujet->getUtilisateur()." Date/Heure: ".$sujet->getDateCreationSujet() ?>
    </p>
    <?php
}