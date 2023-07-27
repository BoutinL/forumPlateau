<?php
    $sujets = $result["data"]['sujets'];
    $categorie = $result["data"]['categorie']
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
} ?>

<h1>Créer un nouveau sujet</h1>
<form action="index.php?ctrl=forum&action=addSujet&id=<?= $categorie->getId() ?>" method="POST">
    <label>Titre de votre sujet:</label></br>
    <input type="text" name="titre" id="titre" required></br>
    <label>Votre premier message:</label></br>
    <textarea name="message" id="message" required></textarea></br>
    <input type="submit" name="submit" value="Ajouter">
</form>