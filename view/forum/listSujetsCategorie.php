<?php

$sujets = $result["data"]['sujets'];
$categorie = $requeteCategorie->fetch();
?>

<h1>liste sujets / catégorie <?= $categorie['typeCategorie'] ?></h1>

<?php
foreach($sujets as $sujet ){

    ?>
    <p><?=$sujet->getTitreSujet()?></p>
    <?php
}


  
